<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Logger;
use App\Http\Services\Payment\BasePaymentService;
use App\Models\AffiliateHistory;
use App\Models\AffiliateRequest;
use App\Models\Bank;
use App\Models\BookingHistory;
use App\Models\Bundle;
use App\Models\BundleCourse;
use App\Models\CartManagement;
use App\Models\City;
use App\Models\ConsultationSlot;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\CouponCourse;
use App\Models\CouponInstructor;
use App\Models\Course;
use App\Models\Order;
use App\Models\Order_billing_address;
use App\Models\Order_item;
use App\Models\Product;
use App\Models\State;
use App\Models\Student;
use App\Models\User;
use App\Models\Withdraw;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use App\Traits\SendNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Session;
use Redirect;
use Stripe;
use Razorpay\Api\Api;
use Exception;
use Mollie\Laravel\Facades\Mollie;
use Unicodeveloper\Paystack\Facades\Paystack;

class CartManagementController extends Controller
{
    use ImageSaveTrait, General, SendNotification;

    private $_api_context;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $logger;

    public function __construct()
    {
        /** Mollie api key **/
        if (env('MOLLIE_KEY')) {
            Mollie::api()->setApiKey(env('MOLLIE_KEY'));
        }

        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(
            new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret']
            )
        );
        $this->_api_context->setConfig($paypal_conf['settings']);

        $this->logger = new Logger();
    }

    public function cartList()
    {
        $data['pageTitle'] = 'Cart';

        // Start:: Check course, bundle, consultation exists or not. If not exists, Delete it.
        $carts = CartManagement::whereUserId(@Auth::user()->id)->get();
        foreach ($carts as $cart){
            if ($cart->course_id) {
                $course = Course::find($cart->course_id);
                if (!$course){
                    CartManagement::where('course_id', $cart->course_id)->delete();
                }
            } elseif ($cart->bundle_id) {
                $bundle = Bundle::find($cart->bundle_id);
                if (!$bundle){
                    CartManagement::where('bundle_id', $cart->bundle_id)->delete();
                }
            } elseif ($cart->consultation_slot_id) {
                $consultation = ConsultationSlot::find($cart->consultation_slot_id);
                if (!$consultation){
                    CartManagement::where('consultation_slot_id', $cart->consultation_slot_id)->delete();
                }
            }
        }
        // End:: Check course, bundle, consultation exists or not. If not exists, Delete it.

        $carts = CartManagement::whereUserId(@Auth::user()->id)->get();
        foreach ($carts as $cart) {
            $cart = CartManagement::find($cart->id);

            // Start:: Course & Promotion Course Check or not
            $course = Course::find($cart->course_id);
            if ($course) {
                $startDate = date('d-m-Y H:i:s', strtotime(@$course->promotionCourse->promotion->start_date));
                $endDate = date('d-m-Y H:i:s', strtotime(@$course->promotionCourse->promotion->end_date));
                $percentage = @$course->promotionCourse->promotion->percentage;
                $promotion_discount_price = number_format($course->price - (($course->price * $percentage) / 100), 2);

                if (now()->gt($startDate) && now()->lt($endDate)) {
                    $cart->promotion_id = @$course->promotionCourse->promotion->id;
                    $cart->price = $promotion_discount_price;
                } else {
                    $cart->main_price = $course->price;
                    $cart->price = $course->price;
                }
            }
            // End:: Course & Promotion Course Check or not

            //Start:: Bundle Offer Check
            $bundle = Bundle::find($cart->bundle_id);
            if ($bundle) {
                $cart->main_price = $bundle->price;
                $cart->price = $bundle->price;
            }
            //End:: Bundle Offer Check

            //Start:: Consultation Check
            if ($cart->consultation_slot_id){
                $consultationSlot = ConsultationSlot::find($cart->consultation_slot_id);

                if ($consultationSlot){
                    $consultationArray = array();
                    $newConsultationDataArray = [
                        'instructor_user_id' => $consultationSlot->user_id,
                        'student_user_id' => Auth::id(),
                        'consultation_slot_id' => $consultationSlot->id,
                        'date' => $cart->consultation_date,
                        'day' => $consultationSlot->day,
                        'time' => $consultationSlot->time,
                        'duration' => $consultationSlot->duration,
                        'status' => 0,
                    ];

                    $consultationArray[] = $newConsultationDataArray;
                    $cart->consultation_details = $consultationArray;

                    $hour_duration = $consultationSlot->hour_duration;
                    $minute_duration = $consultationSlot->minute_duration;
                    $hourly_rate = @$consultationSlot->user->instructor->hourly_rate;
                    $minuteCost = 0;
                    if ($minute_duration > 0){
                        $minuteCost = ($hourly_rate / (60 / $minute_duration));
                    }
                    $totalCost = ($hour_duration * $hourly_rate) + $minuteCost;

                    $cart->main_price = $totalCost;
                    $cart->price = $totalCost;
                }
            }
            //End:: Consultation Check

            $cart->coupon_id = null;
            $cart->discount = 0;
            $cart->save();
        }

        $data['carts'] = CartManagement::whereUserId(@Auth::user()->id)->get();

        return view('frontend.student.cart.cart-list', $data);
    }

    public function applyCoupon(Request $request)
    {
        if (!Auth::check()) {
            $response['msg'] = __("You need to login first!");
            $response['status'] = 401;
            return response()->json($response);
        }

        if (!$request->coupon_code) {
            $response['msg'] = __("Enter coupon code!");
            $response['status'] = 404;
            return response()->json($response);
        }


        if ($request->id) {
            $cart = CartManagement::find($request->id);
            if (!$cart) {
                $response['msg'] = __("Cart item not found!");
                $response['status'] = 404;
                return response()->json($response);
            }

            $coupon = Coupon::where('coupon_code_name', $request->coupon_code)->where('start_date', '<=', Carbon::now()->format('Y-m-d'))->where('end_date', '>=', Carbon::now()->format('Y-m-d'))->first();

            if ($coupon) {
                if ($cart->price < $coupon->minimum_amount) {
                    $response['msg'] = "Minimum " . get_currency_code() . $coupon->minimum_amount . " need to buy for use this coupon!";
                    $response['status'] = 402;
                    return response()->json($response);
                }
            }
            if (!$coupon) {
                $response['msg'] = __("Invalid coupon code!");
                $response['status'] = 404;
                return response()->json($response);
            }


            if (CartManagement::whereUserId(@Auth::user()->id)->whereCouponId($coupon->id)->count() > 0) {
                $response['msg'] = __("You've already used this coupon!");
                $response['status'] = 402;
                return response()->json($response);
            }

            $discount_price = ($cart->price * $coupon->percentage) / 100;

            if ($coupon->coupon_type == 1) {
                $cart->price = round($cart->price - $discount_price);
                $cart->discount = $discount_price;
                $cart->coupon_id = $coupon->id;
                $cart->save();

                $carts = CartManagement::whereUserId(@Auth::user()->id)->get();
                $response['msg'] = __("Coupon Applied");
                $response['price'] = $cart->price;
                $response['discount'] = $cart->discount;
                $response['total'] = get_number_format($carts->sum('price'));
                $response['platform_charge'] = get_platform_charge($carts->sum('price'));
                $response['grand_total'] = get_number_format($carts->sum('price') + get_platform_charge($carts->sum('price')));
                $response['status'] = 200;
                return response()->json($response);
            } elseif ($coupon->coupon_type == 2) {
                if ($cart->course) {
                    $user_id = $cart->course->user_id;
                } else {
                    $user_id = $cart->product->user_id;
                }

                $couponInstructor = CouponInstructor::where('coupon_id', $coupon->id)->where('user_id', $user_id)->orderBy('id', 'desc')->first();
                if ($couponInstructor) {

                    $cart->price = round($cart->price - $discount_price);
                    $cart->discount = $discount_price;
                    $cart->coupon_id = $coupon->id;
                    $cart->save();

                    $carts = CartManagement::whereUserId(@Auth::user()->id)->get();
                    $response['msg'] = __("Coupon Applied");
                    $response['price'] = $cart->price;
                    $response['discount'] = $cart->discount;
                    $response['total'] = get_number_format($carts->sum('price'));
                    $response['platform_charge'] = get_platform_charge($carts->sum('price'));
                    $response['grand_total'] = get_number_format($carts->sum('price') + get_platform_charge($carts->sum('price')));
                    $response['status'] = 200;
                    return response()->json($response);
                } else {
                    $response['msg'] = __("Invalid coupon code!");
                    $response['status'] = 404;
                    return response()->json($response);
                }
            } elseif ($coupon->coupon_type == 3) {
                $couponCourse = CouponCourse::where('coupon_id', $coupon->id)->where('course_id', $cart->course_id)->orderBy('id', 'desc')->first();
                if ($couponCourse) {

                    $cart->price = round($cart->price - $discount_price);
                    $cart->discount = $discount_price;
                    $cart->coupon_id = $coupon->id;
                    $cart->save();

                    $carts = CartManagement::whereUserId(@Auth::user()->id)->get();
                    $response['msg'] = __("Coupon Applied");
                    $response['price'] = $cart->price;
                    $response['discount'] = $cart->discount;
                    $response['total'] = get_number_format($carts->sum('price'));
                    $response['platform_charge'] = get_platform_charge($carts->sum('price'));
                    $response['grand_total'] = get_number_format($carts->sum('price') + get_platform_charge($carts->sum('price')));
                    $response['status'] = 200;
                    return response()->json($response);
                } else {
                    $response['msg'] = __("Invalid coupon code!");
                    $response['status'] = 404;
                    return response()->json($response);
                }
            } else {
                $response['msg'] = __("Invalid coupon code!");
                $response['status'] = 404;
                return response()->json($response);
            }
        } else {
            $response['msg'] = __("Cart item not found!");
            $response['status'] = 404;
            return response()->json($response);
        }
    }

    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            $response['msg'] = __("You need to login first!");
            $response['status'] = 401;
            return response()->json($response);
        }
        DB::beginTransaction();
        try {
            if ($request->course_id) {
                $courseOrderExits = Order_item::whereCourseId($request->course_id)->whereUserId(Auth::user()->id)->first();

                if ($courseOrderExits) {
                    $order = Order::find($courseOrderExits->order_id);
                    if ($order) {
                        if ($order->payment_status == 'due') {
                            Order_item::whereOrderId($courseOrderExits->order_id)->get()->map(function ($q) {
                                $q->delete();
                            });
                            $order->delete();
                        } elseif ($order->payment_status == 'pending') {
                            $response['msg'] = __("You've already request the course & status is pending!");
                            $response['status'] = 402;
                            DB::rollBack();
                            return response()->json($response);
                        } elseif ($order->payment_status == 'paid' || $order->payment_status == 'free') {
                            $response['msg'] = __("You've already purchased the course!");
                            $response['status'] = 402;
                            DB::rollBack();
                            return response()->json($response);
                        }
                    } else {
                        $response['msg'] = __("Something is wrong! Try again.");
                        $response['status'] = 402;
                        DB::rollBack();
                        return response()->json($response);
                    }
                }

                $ownCourseCheck = Course::whereUserId(Auth::user()->id)->where('id', $request->course_id)->first();

                if ($ownCourseCheck) {
                    $response['msg'] = __("This is your course. No need to add to cart.");
                    $response['status'] = 402;
                    DB::rollBack();
                    return response()->json($response);
                }

                $courseExits = Course::find($request->course_id);
                if (!$courseExits) {
                    $response['msg'] = __("Course not found!");
                    $response['status'] = 404;
                    DB::rollBack();
                    return response()->json($response);
                }
            }

            if ($request->product_id) {
                $productExits = Product::find($request->product_id);
                if (!$productExits) {
                    $response['msg'] = __("Product not found!");
                    $response['status'] = 404;
                    DB::rollBack();
                    return response()->json($response);
                }
            }

            if ($request->bundle_id) {
                $bundleExits = Bundle::find($request->bundle_id);
                if (!$bundleExits) {
                    $response['msg'] = __("Bundle not found!");
                    $response['status'] = 404;
                    DB::rollBack();
                    return response()->json($response);
                }

                $ownBundleCheck = Bundle::whereUserId(Auth::user()->id)->where('id', $request->bundle_id)->first();
                if ($ownBundleCheck) {
                    $response['msg'] = __("This is your bundle offer. No need to add to cart.");
                    $response['status'] = 402;
                    DB::rollBack();
                    return response()->json($response);
                }

                $bundleOrderExits = Order_item::whereUserId(Auth::user()->id)->where('bundle_id', $request->bundle_id)->first();
                if ($bundleOrderExits) {
                    $order = Order::find($bundleOrderExits->order_id);
                    if ($order) {
                        if ($order->payment_status == 'due') {
                            Order_item::whereOrderId($bundleOrderExits->order_id)->get()->map(function ($q) {
                                $q->delete();
                            });
                            $order->delete();
                        } elseif ($order->payment_status == 'pending') {
                            $response['msg'] = __("You've already request this bundle & status is pending!");
                            $response['status'] = 402;
                            DB::rollBack();
                            return response()->json($response);
                        } elseif ($order->payment_status == 'paid' || $order->payment_status == 'free') {
                            $response['msg'] = __("You've already purchased this bundle!");
                            $response['status'] = 402;
                            DB::rollBack();
                            return response()->json($response);
                        }
                    } else {
                        $response['msg'] = __("Something is wrong! Try again.");
                        $response['status'] = 402;
                        DB::rollBack();
                        return response()->json($response);
                    }
                }
            }

            //Start:: Cart Management
            if ($request->course_id) {
                $cartExists = CartManagement::whereUserId(Auth::user()->id)->whereCourseId($request->course_id)->first();
            } elseif ($request->product_id) {
                $cartExists = CartManagement::whereUserId(Auth::user()->id)->whereProductId($request->product_id)->first();
            } elseif ($request->bundle_id) {
                $cartExists = CartManagement::whereUserId(Auth::user()->id)->whereBundleId($request->bundle_id)->first();
            }

            if ($cartExists) {
                $response['msg'] = __("Already added to cart!");
                $response['status'] = 409;
                DB::rollBack();
                return response()->json($response);
            }

            if ($request->course_id) {
                if ($courseExits->learner_accessibility == 'free') {
                    $order = new Order();
                    $order->user_id = Auth::user()->id;
                    $order->order_number = rand(100000, 999999);
                    $order->payment_status = 'free';
                    $order->save();

                    $order_item = new Order_item();
                    $order_item->order_id = $order->id;
                    $order_item->user_id = Auth::user()->id;
                    $order_item->course_id = $courseExits->id;
                    $order_item->owner_user_id = $courseExits->user_id ?? null;
                    $order_item->unit_price = 0;
                    $order_item->admin_commission = 0;
                    $order_item->owner_balance = 0;
                    $order_item->sell_commission = 0;
                    $order_item->save();

                    $response['msg'] = __("Free Course added to your my learning list!");
                    $response['status'] = 200;
                    DB::commit();
                    return response()->json($response);
                }
            }

            $cart = new CartManagement();
            $cart->user_id = Auth::user()->id;
            $cart->course_id = $request->course_id;
            $cart->product_id = $request->product_id;
            $cart->bundle_id = $request->bundle_id;

            if ($request->course_id) {
                $cart->main_price = $courseExits->price;
                $cart->price = $courseExits->price;
            }

            if ($request->bundle_id) {
                $bundleCourses = BundleCourse::where('bundle_id', $request->bundle_id)->pluck('course_id')->toArray();
                $cart->bundle_course_ids = $bundleCourses;
                $cart->main_price = $bundleExits->price;
                $cart->price = $bundleExits->price;
            }
            if ($request->product_id) {
                $cart->main_price = $productExits->price;
                $cart->price = $productExits->price;
            }
            $refData = $request->get('ref','');
            if($refData != ''){
                $refList = json_decode($refData);
                foreach ($refList as $refHash){
                    $refPair = explode('$',$refHash);
                    if($refPair[0] == $cart->course_id){
                        $refRequest = AffiliateRequest::where(['affiliate_code' => $refPair[1],'status' => STATUS_APPROVED])->first();
                        if(!is_null($refRequest)){
                            $refUser = User::where(['id'=>$refRequest->user_id])->first() ;
                            if($refUser->is_affiliator == AFFILIATOR){
                                $cart->reference = $refPair[1];
                                break;
                            }
                        }

                    }
                }
            }

            $cart->save();

            $response['quantity'] = CartManagement::whereUserId(Auth::user()->id)->count();
            $response['msg'] = __("Added to cart");
            $response['msgInfoChange'] = __("Added to cart");
            $response['status'] = 200;
            //End:: Cart Management
            DB::commit();
            return response()->json($response);
        }catch (\Exception $e) {
            DB::rollBack();
            $response['msg'] = __("Something is wrong! Try again.");
            $response['status'] = 402;
            return response()->json($response);
        }
    }

    public function addToCartConsultation(Request $request)
    {

        if (!Auth::check()) {
            $response['msg'] = __("You need to login first!");
            $response['status'] = 401;
            return response()->json($response);
        }

        if ($request->consultation_slot_id) {
            DB::beginTransaction();
            try {
                $consultationExit = ConsultationSlot::whereId($request->consultation_slot_id)->whereUserId($request->booking_instructor_user_id)->first();

                if (!$consultationExit) {
                    $response['msg'] = __("Time slot not found!");
                    $response['status'] = 404;
                    DB::rollBack();
                    return response()->json($response);
                }

                $ownConsultationSlotCheck = ConsultationSlot::whereId($request->consultation_slot_id)->whereUserId(Auth::id())->first();
                if ($ownConsultationSlotCheck) {
                    $response['msg'] = __("This is your consultation slot. No need to add.");
                    $response['status'] = 402;
                    DB::rollBack();
                    return response()->json($response);
                }

                $consultationOrderBooked = Order_item::whereConsultationSlotId($request->consultation_slot_id)->where('consultation_date', $request->bookingDate)->first();
                if ($consultationOrderBooked){
                    $order = Order::find($consultationOrderBooked->order_id);
                    if ($order) {
                        if ($order->payment_status == 'paid' || $order->payment_status == 'free') {
                            $response['msg'] = __("This slot already purchased. Please try another slot.");
                            $response['status'] = 402;
                            DB::rollBack();
                            return response()->json($response);
                        }
                    } else {
                        $response['msg'] = __("Something is wrong! Try again.");
                        $response['status'] = 402;
                        DB::rollBack();
                        return response()->json($response);
                    }

                }

                $consultationOrderExit = Order_item::whereUserId(Auth::user()->id)->whereConsultationSlotId($request->consultation_slot_id)->where('consultation_date', $request->bookingDate)->first();
                if ($consultationOrderExit) {
                    $order = Order::find($consultationOrderExit->order_id);
                    if ($order) {
                        if ($order->payment_status == 'due') {
                            Order_item::whereOrderId($consultationOrderExit->order_id)->get()->map(function ($q) {
                                $q->delete();
                            });
                            $order->delete();
                        } elseif ($order->payment_status == 'pending') {
                            $response['msg'] = __("You've already request this slot & status is pending!");
                            $response['status'] = 402;
                            DB::rollBack();
                            return response()->json($response);
                        } elseif ($order->payment_status == 'paid' || $order->payment_status == 'free') {
                            $response['msg'] = __("You've already purchased this slot!");
                            $response['status'] = 402;
                            DB::rollBack();
                            return response()->json($response);
                        }
                    } else {
                        $response['msg'] = __("Something is wrong! Try again.");
                        $response['status'] = 402;
                        DB::rollBack();
                        return response()->json($response);
                    }
                }

                $consultationOrderExit = Order_item::whereConsultationSlotId($request->consultation_slot_id)->where('consultation_date', $request->bookingDate)->first();
                if ($consultationOrderExit) {
                    $order = Order::find($consultationOrderExit->order_id);
                    if ($order) {
                        if ($order->payment_status == 'pending') {
                            $response['msg'] = __("Another User already request this slot!");
                            $response['status'] = 402;
                            DB::rollBack();
                            return response()->json($response);
                        } elseif ($order->payment_status == 'paid' || $order->payment_status == 'free') {
                            $response['msg'] = __("Another User already purchased this slot!");
                            $response['status'] = 402;
                            DB::rollBack();
                            return response()->json($response);
                        }
                    } else {
                        $response['msg'] = __("Something is wrong! Try again.");
                        $response['status'] = 402;
                        DB::rollBack();
                        return response()->json($response);
                    }

                }


                $cartExists = CartManagement::whereUserId(Auth::user()->id)->whereConsultationSlotId($request->consultation_slot_id)->where('consultation_date', $request->bookingDate)->first();
                if ($cartExists) {
                    $response['msg'] = __("Already added to cart!");
                    $response['status'] = 409;
                    DB::rollBack();
                    return response()->json($response);
                }

                $cart = new CartManagement();
                $cart->user_id = Auth::user()->id;
                $cart->consultation_slot_id = $request->consultation_slot_id;

                $consultationArray = array();
                $newConsultationDataArray = [
                    'instructor_user_id' => $consultationExit->user_id,
                    'student_user_id' => Auth::id(),
                    'consultation_slot_id' => $consultationExit->id,
                    'date' => $request->bookingDate,
                    'day' => $consultationExit->day,
                    'time' => $consultationExit->time,
                    'duration' => $consultationExit->duration,
                    'status' => 0,
                ];

                $consultationArray[] = $newConsultationDataArray;

                $cart->consultation_details = $consultationArray;
                $cart->consultation_date = $request->bookingDate;
                $cart->consultation_available_type = $request->available_type;

                /*
                * Price Calculation
                */
                $hour_duration = $consultationExit->hour_duration;
                $minute_duration = $consultationExit->minute_duration;
                $hourly_rate = @$consultationExit->user->instructor->hourly_rate;
                $minuteCost = 0;
                if ($minute_duration > 0){
                    $minuteCost = ($hourly_rate / (60 / $minute_duration));
                }
                $totalCost = ($hour_duration * $hourly_rate) + $minuteCost;

                $cart->main_price = $totalCost;
                $cart->price = $totalCost;
                $cart->save();


                $response['status'] = 200;
                $response['msg'] = __("Consultation added to cart");
                $response['redirect_route'] = route('student.cartList');
                DB::commit();
                return response()->json($response);
            }catch (\Exception $e){
                DB::rollBack();
                $response['msg'] = __("Something is wrong! Try again.");
                $response['status'] = 402;
                return response()->json($response);
            }
        } else {
            $response['msg'] = __("Time slot not found!");
            $response['status'] = 404;
            return response()->json($response);
        }

    }

    public function goToCheckout(Request $request)
    {
        if ($request->has('proceed_to_checkout')) {
            return redirect(route('student.checkout'));
        } elseif ($request->has('pay_from_lmszai_wallet')) {
            $carts = CartManagement::whereUserId(@Auth::user()->id)->get();
            if (!is_array($carts)){
                $this->showToastrMessage('error', __('Your cart is empty!'));
                return redirect()->back();
            }
            if ($carts->sum('price') > int_to_decimal(Auth::user()->balance)) {
                $this->showToastrMessage('warning', __('Insufficient balance'));
                return redirect()->back();
            } else {
                DB::beginTransaction();
                try{
                    $order = $this->placeOrder('buy');
                    $order->payment_status = 'paid';
                    $order->save();

                    /** ====== Send notification =========*/
                    $text = __("New student enrolled");
                    $target_url = route('instructor.all-student');
                    foreach ($order->items as $item) {
                        if ($item->course) {
                            $this->send($text, 2, $target_url, $item->course->user_id);
                        }
                    }

                    $text = __("Course has been sold");
                    $this->send($text, 1, null, null);

                    /** ====== Send notification =========*/

                    $withdrow = new Withdraw();
                    $withdrow->transection_id = Str::uuid()->getHex();
                    $withdrow->amount = $carts->sum('price');
                    $withdrow->payment_method = 'buy';
                    $withdrow->status = WITHDRAWAL_STATUS_COMPLETE;
                    $withdrow->save();
                    Auth::user()->decrement('balance', decimal_to_int($carts->sum('price')));
                    createTransaction(Auth::id(),$carts->sum('price'),TRANSACTION_BUY,'Transaction for Course Purchase');
                    DB::commit();
                }catch (\Exception $e){
                    DB::rollBack();
                    $this->showToastrMessage('warning', __('Something Went Wrong'));
                    return redirect()->back();
                }



                $this->showToastrMessage('success', __('Payment has been completed'));
                return redirect()->route('student.thank-you');
            }
        } elseif ($request->has('cancel_order')) {
            CartManagement::whereUserId(@Auth::user()->id)->delete();
            $this->showToastrMessage('warning', __('Order has been cancel'));
            return redirect(url('/'));
        } else {
            abort(404);
        }
    }

    public function cartDelete($id)
    {
        $cart = CartManagement::findOrFail($id);
        $cart->delete();
        $this->showToastrMessage('success', __('Removed from cart list!'));
        return redirect()->back();
    }

    public function fetchBank(Request $request)
    {
        $bank_id = Bank::find($request->bank_id);
        if ($bank_id) {
            return response()->json([
                'account_number' => $bank_id->account_number,
            ]);
        }
    }

    public function checkout()
    {
        $data['pageTitle'] = "Checkout";
        $data['carts'] = CartManagement::whereUserId(@Auth::user()->id)->get();
        $data['student'] = auth::user()->student;
        $data['countries'] = Country::orderBy('country_name', 'asc')->get();
        $data['banks'] = Bank::orderBy('name', 'asc')->where('status', 1)->get();

        if (old('country_id')) {
            $data['states'] = State::where('country_id', old('country_id'))->orderBy('name', 'asc')->get();
        }

        if (old('state_id')) {
            $data['cities'] = City::where('state_id', old('state_id'))->orderBy('name', 'asc')->get();
        }

        $razorpay_grand_total_with_conversion_rate = ($data['carts']->sum('price') + get_platform_charge($data['carts']->sum('price'))) * (get_option('razorpay_conversion_rate') ? get_option('razorpay_conversion_rate') : 0);
        $data['razorpay_grand_total_with_conversion_rate'] = (float)preg_replace("/[^0-9.]+/", "", number_format($razorpay_grand_total_with_conversion_rate, 2));

        $paystack_grand_total_with_conversion_rate = ($data['carts']->sum('price') + get_platform_charge($data['carts']->sum('price'))) * (get_option('paystack_conversion_rate') ? get_option('paystack_conversion_rate') : 0);
        $data['paystack_grand_total_with_conversion_rate'] = (float)preg_replace("/[^0-9.]+/", "", number_format($paystack_grand_total_with_conversion_rate, 2));

        $sslcommerz_grand_total_with_conversion_rate = ($data['carts']->sum('price') + get_platform_charge($data['carts']->sum('price'))) * (get_option('sslcommerz_conversion_rate') ? get_option('sslcommerz_conversion_rate') : 0);
        $data['sslcommerz_grand_total_with_conversion_rate'] = (float)preg_replace("/[^0-9.]+/", "", number_format($sslcommerz_grand_total_with_conversion_rate, 2));

        return view('frontend.student.cart.checkout', $data);
    }

    public function razorpay_payment(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        if (empty(env('RAZORPAY_KEY')) && empty(env('RAZORPAY_SECRET'))) {
            $this->showToastrMessage('error', __('Razorpay payment gateway off!'));
            return redirect()->back();
        }
        DB::beginTransaction();
        try {
            $payment = $api->payment->fetch($input['razorpay_payment_id']);
            $this->logger->log('transaction razorpay ', json_encode($payment));

            if (count($input) && !empty($input['razorpay_payment_id'])) {
                try {
                    $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                } catch (Exception $e) {
                    DB::rollBack();
                    Session::put('error', $e->getMessage());
                    return redirect()->back();
                }
            }

            $order_data = $this->placeOrder($request->payment_method);
            if($order_data['status']){
                $order = $order_data['data'];
            }else{
                $this->showToastrMessage('error', __('Something went wrong!'));
                return redirect()->back();
            }

            $order->payment_status = 'paid';
            $order->payment_method = 'razorpay';

            /* Start:: Create transaction, affiliate history, user balance increment/decrement */
            foreach ($order->items as $order_item) {
                createTransaction($order_item->owner_user_id, $order_item->owner_balance, TRANSACTION_SELL, 'Earning via sell', 'Order_item (' . $order_item->id .')');
                $owner_user = User::find($order_item->owner_user_id);
                if ($owner_user) {
                    $owner_user->increment('balance', decimal_to_int($order_item->owner_balance));
                }

                $affiliateHistory = AffiliateHistory::whereOrderItemId($order_item->id)->first();
                if ($affiliateHistory) {
                    $refUser = User::find($affiliateHistory->user_id);
                    $refUser->increment('balance', decimal_to_int($affiliateHistory->commission));
                    createTransaction($refUser->id,$affiliateHistory->commission,TRANSACTION_AFFILIATE,AFFILIATE_NARRATION);
                    $affiliateHistory->status = AFFILIATE_HISTORY_STATUS_PAID;
                    $affiliateHistory->save();
                }
            }
            /* End:: Create transaction, affiliate history, user balance increment/decrement */

            $payment_currency = get_option('razorpay_currency');
            $conversion_rate = get_option('razorpay_conversion_rate') ? get_option('razorpay_conversion_rate') : 0;

            $order->payment_currency = $payment_currency;
            $order->conversion_rate = $conversion_rate;
            $order->grand_total_with_conversation_rate = ($order->sub_total + $order->platform_charge) * $conversion_rate;
            $order->save();
            DB::commit();
        } catch(Exception $exception) {
            DB::rollBack();
            $this->logger->log('transaction failed razorpay', $exception->getMessage());
            $this->showToastrMessage('error', __('Something went wrong!'));
            return redirect()->back();
        }


        /** ====== Send notification =========*/
        $text = __("New student enrolled");
        $target_url = route('instructor.all-student');
        foreach ($order->items as $item) {
            if ($item->course) {
                $this->send($text, 2, $target_url, $item->course->user_id);
            }
        }

        $text = __("Course has been sold");
        $this->send($text, 1, null, null);

        /** ====== Send notification =========*/

        $this->showToastrMessage('success', __('Payment has been completed'));
        return redirect()->route('student.thank-you');
    }

    public function pay(Request $request)
    {
        if (is_null($request->payment_method)) {
            $this->showToastrMessage('warning', __('Please Select Payment Method'));
            return redirect()->back();
        }
        if ($request->payment_method == 'bank') {
            if (empty($request->deposit_by) || is_null($request->deposit_slip)) {
                $this->showToastrMessage('error', __('Bank Information Not Valid!'));
                return redirect()->back();
            }
        }

        if ($request->payment_method == 'paypal') {
            if (empty(env('PAYPAL_CLIENT_ID')) || empty(env('PAYPAL_SECRET')) || empty(env('PAYPAL_MODE'))) {
                $this->showToastrMessage('error', __('Paypal payment gateway is off!'));
                return redirect()->back();
            }
        }

        if ($request->payment_method == 'mollie') {
            if (empty(env('MOLLIE_KEY'))) {
                $this->showToastrMessage('error', __('Mollie payment gateway is off!'));
                return redirect()->back();
            }
        }

        if ($request->payment_method == 'instamojo') {
            if (empty(env('IM_API_KEY')) || empty(env('IM_AUTH_TOKEN')) || empty(env('IM_URL'))) {
                $this->showToastrMessage('error', __('Instamojo payment gateway is off!'));
                return redirect()->back();
            }
        }
        if ($request->payment_method == 'paystack') {
            if (empty(env('PAYSTACK_PUBLIC_KEY')) || empty(env('PAYSTACK_SECRET_KEY'))) {
                $this->showToastrMessage('error', __('Paystack payment gateway is off!'));
                return redirect()->back();
            }
        }
        $order_data = $this->placeOrder($request->payment_method);
        if($order_data['status']){
            $order = $order_data['data'];
        }else{
            $this->showToastrMessage('error', __('Something went wrong!'));
            return redirect()->back();
        }
        /** order billing address */

        if (auth::user()->student) {
            $student = Student::find(auth::user()->student->id);
            $student->fill($request->all());
            $student->save();
        }

        if ($request->payment_method == PAYPAL) {
            $total = $order->grand_total * (get_option('paypal_conversion_rate') ? get_option('paypal_conversion_rate') : 0);
            $total = number_format($total, 2,'.','');
            $object = [
                'id' => $order->uuid,
                'payment_method' => PAYPAL,
                'currency' => get_option('paypal_currency')
            ];
            $getWay = new BasePaymentService($object);
            $responseData = $getWay->makePayment($total);
            if($responseData['success']){
                $order->payment_id = $responseData['payment_id'];
                $order->save();
                return Redirect::away($responseData['redirect_url']);
            }else{
                $this->showToastrMessage('error', __('Something went wrong!'));
                return redirect()->back();
            }

        } else if ($request->payment_method == MOLLIE) {
            $object = [
                'id' => $order->uuid,
                'payment_method' => MOLLIE,
                'currency' => get_option('mollie_currency')
            ];
            $total = $order->grand_total * (get_option('mollie_conversion_rate') ? get_option('mollie_conversion_rate') : 0);
            $total = number_format($total, 2,'.','');
            $getWay = new BasePaymentService($object);
            $responseData = $getWay->makePayment($total);

            if($responseData['success']){
                $order->payment_id = $responseData['payment_id'];
                $order->save();
                return Redirect::away($responseData['redirect_url']);
            }else{
                $this->showToastrMessage('error', __('Something went wrong!'));
                return redirect()->back();
            }
        } else if ($request->payment_method == INSTAMOJO) {
            $total = $order->grand_total * (get_option('im_conversion_rate') ? get_option('im_conversion_rate') : 0);
            $total = number_format($total, 2,'.','');
            $object = [
                'id' => $order->uuid,
                'payment_method' => INSTAMOJO,
                'currency' => get_option('im_currency')
            ];
            $getWay = new BasePaymentService($object);
            $responseData = $getWay->makePayment($total);

            if($responseData['success']){
                $order->payment_id = $responseData['payment_id'];
                $order->save();
                return Redirect::away($responseData['redirect_url']);
            }else{
                $this->showToastrMessage('error', __('Something went wrong!'));
                return redirect()->back();
            }

        } else if ($request->payment_method == PAYSTAC) {
            $total = $order->grand_total * (get_option('paystack_conversion_rate') ? get_option('paystack_conversion_rate') : 0);
            $total = number_format($total, 2,'.','');
            $object = [
                'id' => $order->uuid,
                'payment_method' => PAYSTAC,
                'currency' => get_option('paystack_currency'),
                'reference' => $request->reference
            ];
            $getWay = new BasePaymentService($object);
            $responseData = $getWay->makePayment($total);

            if($responseData['success']){
                $order->payment_id = $responseData['payment_id'];
                $order->save();
                return Redirect::away($responseData['redirect_url']);
            }else{
                $this->showToastrMessage('error', __('Something went wrong!'));
                return redirect()->back();
            }

        } else if ($request->payment_method == BANK) {
            $deposit_by = $request->deposit_by;
            $deposit_slip = $this->uploadFileWithDetails('bank', $request->deposit_slip);
            if (!$deposit_slip['is_uploaded']) {
                $this->showToastrMessage('error', __('Something went wrong! Failed to upload file'));
                return redirect()->back();
            }

            $order->payment_status = 'pending';
            $order->deposit_by = $deposit_by;
            $order->deposit_slip = $deposit_slip['path'];
            $order->payment_method = 'bank';
            $order->bank_id = $request->bank_id;
            $order->save();

            /** ====== Send notification =========*/
            $text = __("New course enrolled pending request");
            $target_url = route('report.order-pending');
            $this->send($text, 1, $target_url, null);
            /** ====== Send notification =========*/
            $this->showToastrMessage('success', __('Request has been Placed! Please Wait for Approve'));
            return redirect()->route('student.thank-you');
        } else if ($request->payment_method == SSLCOMMERZ)  {

            $total = $order->grand_total * (get_option('sslcommerz_conversion_rate') ? get_option('sslcommerz_conversion_rate') : 0);
            $total = number_format($total, 2,'.','');
            # CUSTOMER INFORMATION
            $post_data = array();
            $post_data['tran_id'] = $order->uuid; // tran_id must be unique
            $post_data['product_category'] = "Payment for purchase";
            $phone = '0170000';
            $student = $order->user->student;

            $post_data['cus_name'] = Auth::user()->name;
            $post_data['cus_phone'] = $request->input('phone_number',$student->address);
            $post_data['cus_email'] = $request->input('email',$order->user->email);
            $post_data['cus_add1'] = $request->input('address',$student->address);
            $post_data['cus_add2'] = "";
            $post_data['cus_city'] = "";
            $post_data['cus_state'] = "";
            $post_data['cus_postcode'] = $request->input('postal_code','017');
            $post_data['cus_country'] = @$student->country->country_name ?? 'BD';
            $post_data['cus_phone'] = $phone;
            $post_data['cus_fax'] = "";

            # SHIPMENT INFORMATION
            $post_data['ship_name'] = get_option('app_name') ?? 'LMS Store';
            $post_data['ship_add1'] = $request->input('phone_number',$student->address);
            $post_data['ship_add2'] =  '';
            $post_data['ship_city'] =  '';
            $post_data['ship_state'] =  '';
            $post_data['ship_postcode'] = '';
            $post_data['ship_phone'] = $request->input('phone_number',$student->address);
            $post_data['ship_country'] = @$student->country->country_name ?? 'BD';

            $post_data['shipping_method'] = "NO";
            $post_data['product_name'] = "Course Buy";

            $post_data['product_profile'] = "digital-goods";

            # OPTIONAL PARAMETERS
            $post_data['value_a'] = "ref001";
            $post_data['value_b'] = "ref002";
            $post_data['value_c'] = "ref003";
            $post_data['value_d'] = "ref004";

            $object = [
                'id' => $order->uuid,
                'payment_method' => SSLCOMMERZ,
                'currency' => get_option('sslcommerz_currency')
            ];

            $getWay = new BasePaymentService($object);
            $responseData = $getWay->makePayment($total,$post_data);
            if($responseData['success']){
                $order->payment_id = $responseData['payment_id'];
                $order->save();
                return Redirect::away($responseData['redirect_url']);
            }else{
                $this->showToastrMessage('error', __('Something went wrong!'));
                return redirect()->back();
            }
        } else if ($request->payment_method == STRIPE)  {

            $total = $order->grand_total * (get_option('stripe_conversion_rate') ? get_option('stripe_conversion_rate') : 0);
            $total = number_format($total, 2,'.','');

            $object = [
                'id' => $order->uuid,
                'payment_method' => STRIPE,
                'currency' => get_option('stripe_currency'),
                'token' => $request->stripeToken
            ];
            $getWay = new BasePaymentService($object);
            $responseData = $getWay->makePayment($total);

            if($responseData['success']){
                if($responseData['data']['payment_status'] == 'success') {
                    $order->payment_id = $responseData['payment_id'];
                    $order->payment_status = 'paid';
                    $order->save();
                    giveAffiliateCommission($order);
                    /** ====== Send notification =========*/
                    $text = __("New student enrolled");
                    $target_url = route('instructor.all-student');
                    foreach ($order->items as $item) {
                        if ($item->course) {
                            $this->send($text, 2, $target_url, $item->course->user_id);
                        }
                    }
                    $text = __("Course has been sold");
                    $this->send($text, 1, null, null);
                    /** ====== Send notification =========*/
                    $this->showToastrMessage('success', __('Payment has been completed'));
                    return redirect()->route('student.thank-you');
                }
            }
            $this->showToastrMessage('error', __('Something went wrong!'));
            return redirect()->back();
        }
    }

//    public function instamojoPaymentSuccess(Request $request, $id)
//    {
//        //  "payment_id"  "payment_status"  "payment_request_id"
//
//        if ($request->payment_status == 'Credit') {
//            $order = Order::find($id);
//            $order->payment_status = 'paid';
//            $order->save();
//            $this->logger->log('payment done instamojo', json_encode($order));
//            /* Start:: Create transaction, affiliate history, user balance increment/decrement */
//            foreach ($order->items as $order_item) {
//                createTransaction($order_item->owner_user_id, $order_item->owner_balance, TRANSACTION_SELL, 'Earning via sell', 'Order_item (' . $order_item->id .')');
//                $owner_user = User::find($order_item->owner_user_id);
//                if ($owner_user) {
//                    $owner_user->increment('balance', decimal_to_int($order_item->owner_balance));
//                }
//
//                $affiliateHistory = AffiliateHistory::whereOrderItemId($order_item->id)->first();
//                if ($affiliateHistory) {
//                    $refUser = User::find($affiliateHistory->user_id);
//                    $refUser->increment('balance', decimal_to_int($affiliateHistory->commission));
//                    createTransaction($refUser->id,$affiliateHistory->commission,TRANSACTION_AFFILIATE,AFFILIATE_NARRATION);
//                    $affiliateHistory->update(['status', AFFILIATE_HISTORY_STATUS_PAID]);
//                }
//            }
//            /* End:: Create transaction, affiliate history, user balance increment/decrement */
//
//            $this->showToastrMessage('success', 'Payment has been completed');
//            return redirect()->route('student.thank-you');
//        }
//        $this->showToastrMessage('error', 'Payment has been declined');
//        return redirect(url('/'));
//    }

//    public function molliePaymentSuccess($id)
//    {
//        $order = Order::find($id);
//        $order->payment_status = 'paid';
//        $order->save();
//        $this->logger->log('Payment done mollie', json_encode($order));
//        /* Start:: Create transaction, affiliate history, user balance increment/decrement */
//        foreach ($order->items as $order_item) {
//            createTransaction($order_item->owner_user_id, $order_item->owner_balance, TRANSACTION_SELL, 'Earning via sell', 'Order_item (' . $order_item->id .')');
//            $owner_user = User::find($order_item->owner_user_id);
//            if ($owner_user) {
//                $owner_user->increment('balance', decimal_to_int($order_item->owner_balance));
//            }
//
//            $affiliateHistory = AffiliateHistory::whereOrderItemId($order_item->id)->first();
//            if ($affiliateHistory) {
//                $refUser = User::find($affiliateHistory->user_id);
//                $refUser->increment('balance', decimal_to_int($affiliateHistory->commission));
//                createTransaction($refUser->id,$affiliateHistory->commission,TRANSACTION_AFFILIATE,AFFILIATE_NARRATION);
//                $affiliateHistory->update(['status', AFFILIATE_HISTORY_STATUS_PAID]);
//            }
//        }
//        /* End:: Create transaction, affiliate history, user balance increment/decrement */
//        $this->showToastrMessage('success', 'Payment has been completed');
//        return redirect()->route('student.thank-you');
//    }

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function paystackPayment(Request $request)
    {
        //dd($request->all());
        try {
            $order_data = $this->placeOrder('paystack');
            if($order_data['status']){
                $order = $order_data['data'];
            }else{
                $this->showToastrMessage('error', __('Something went wrong!'));
                return redirect()->back();
            }

            $order->paystack_reference_number = $request->reference;

            $order->save();
            return Paystack::getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            $this->showToastrMessage('error', __('The paystack token has expired. Please refresh the page and try again.'));
            return redirect()->back();
        }
    }

   /**
    * Obtain Paystack payment information
    * @return void
    */
   public function handlePaystackGatewayCallback()
   {
       $paymentDetails = Paystack::getPaymentData();

       // Now you have the payment details,
       // you can store the authorization_code in your db to allow for recurrent subscriptions
       // you can then redirect or do whatever you want

       if ($paymentDetails) {
           $status = $paymentDetails['data']['status'];
           $reference = $paymentDetails['data']['reference'];
           if ($status == 'success') {
               $order = Order::where('paystack_reference_number', $reference)->first();
               if ($order) {
                   $order->payment_status = 'paid';
                   $order->payment_method = 'paystack';
                   $order->save();
                   $this->logger->log('Payment done paystack', json_encode($order));
                   $this->logger->log('Payment details paystack', json_encode($paymentDetails));
                   /* Start:: Create transaction, affiliate history, user balance increment/decrement */
                   foreach ($order->items as $order_item) {
                       createTransaction($order_item->owner_user_id, $order_item->owner_balance, TRANSACTION_SELL, 'Earning via sell', 'Order_item (' . $order_item->id .')');
                       $owner_user = User::find($order_item->owner_user_id);
                       if ($owner_user) {
                           $owner_user->increment('balance', decimal_to_int($order_item->owner_balance));
                       }

                       $affiliateHistory = AffiliateHistory::whereOrderItemId($order_item->id)->first();
                       if ($affiliateHistory) {
                           $refUser = User::find($affiliateHistory->user_id);
                           $refUser->increment('balance', decimal_to_int($affiliateHistory->commission));
                           createTransaction($refUser->id,$affiliateHistory->commission,TRANSACTION_AFFILIATE,AFFILIATE_NARRATION);
                           $affiliateHistory->update(['status', AFFILIATE_HISTORY_STATUS_PAID]);
                       }
                   }
                   /* End:: Create transaction, affiliate history, user balance increment/decrement */
                   /** ====== Send notification =========*/
                   $text = __("New student enrolled");
                   $target_url = route('instructor.all-student');
                   foreach ($order->items as $item) {
                       if ($item->course) {
                           $this->send($text, 2, $target_url, $item->course->user_id);
                       }
                   }

                   $text = __("Course has been sold");
                   $this->send($text, 1, null, null);

                   /** ====== Send notification =========*/

                   $this->showToastrMessage('success', __('Payment has been completed'));
                   return redirect()->route('student.thank-you');
               }

           }
       } else {
           $this->showToastrMessage('error', __('Payment has been failed. Please try again.'));
           return redirect()->route('main.index');
       }
   }

//
//    public function paypalPaymentStatus(Request $request)
//    {
//        /** Get the payment ID before session clear **/
//        $payment_id = Session::get('paypal_payment_id');
//        $order_uuid = Session::get('order_uuid');
//
//        /** clear the session payment ID **/
//        Session::forget('paypal_payment_id');
//        Session::forget('order_uuid');
//        if (empty($request->PayerID) || empty($request->token)) {
//            $this->showToastrMessage('error', 'Payment has been declined');
//            return redirect(url('/'));
//        }
//
//        $payment = Payment::get($payment_id, $this->_api_context);
//        $execution = new PaymentExecution();
//        $execution->setPayerId($request->PayerID);
//
//        /**Execute the payment **/
//        $result = $payment->execute($execution, $this->_api_context);
//
//
//        if ($result->getState() == 'approved') {
//            $transactions = $result->getTransactions();
//            $order = Order::whereUuid($order_uuid)->firstOrFail();;
//            $order->payment_status = 'paid';
//            $order->payment_method = 'paypal';
//            $order->save();
//            $this->logger->log('Payment done paypal', json_encode($order));
//            $this->logger->log('Payment details paypal', json_encode($result));
//            /* Start:: Create transaction, affiliate history, user balance increment/decrement */
//            foreach ($order->items as $order_item) {
//                createTransaction($order_item->owner_user_id, $order_item->owner_balance, TRANSACTION_SELL, 'Earning via sell', 'Order_item (' . $order_item->id .')');
//                $owner_user = User::find($order_item->owner_user_id);
//                if ($owner_user) {
//                    $owner_user->increment('balance', decimal_to_int($order_item->owner_balance));
//                }
//
//                $affiliateHistory = AffiliateHistory::whereOrderItemId($order_item->id)->first();
//                if ($affiliateHistory) {
//                    $refUser = User::find($affiliateHistory->user_id);
//                    $refUser->increment('balance', decimal_to_int($affiliateHistory->commission));
//                    createTransaction($refUser->id,$affiliateHistory->commission,TRANSACTION_AFFILIATE,AFFILIATE_NARRATION);
//                    $affiliateHistory->update(['status', AFFILIATE_HISTORY_STATUS_PAID]);
//                }
//            }
//            /* End:: Create transaction, affiliate history, user balance increment/decrement */
//            /** ====== Send notification =========*/
//            $text = __("New student enrolled");
//            $target_url = route('instructor.all-student');
//            foreach ($order->items as $item) {
//                if ($item->course) {
//                    $this->send($text, 2, $target_url, $item->course->user_id);
//                }
//            }
//
//            $text = __("Course has been sold");
//            $this->send($text, 1, null, null);
//
//            /** ====== Send notification =========*/
//
//            $this->showToastrMessage('success', 'Payment has been completed');
//            return redirect()->route('student.thank-you');
//        }
//
//        $this->showToastrMessage('error', 'Payment has been declined');
//        return redirect(url('/'));
//    }
//
//    public function payViaSslcommerz(Request $request)
//    {
//        $order_data = $this->placeOrder(SSLCOMMERZ);
//        if($order_data['status']){
//            $order = $order_data['data'];
//        }else{
//            $this->showToastrMessage('error', 'Something went wrong!');
//            return redirect()->back();
//        }
//
//        $cart_json = json_decode($request->cart_json);
//
//        //Start:: Conversion rate
//        $total = $order->grand_total * (get_option('sslcommerz_conversion_rate') ? get_option('sslcommerz_conversion_rate') : 0);
//        $total = number_format($total, 2,'.','');
//        # CUSTOMER INFORMATION
//        $post_data = array();
//        $post_data['tran_id'] = $order->uuid; // tran_id must be unique
//        $post_data['product_category'] = "Payment for purchase";
//        $phone = '0170000';
//        $student = $order->user->student;
//
//        $post_data['cus_name'] = Auth::user()->name;
//        $post_data['cus_phone'] = $cart_json->cus_phone ? $student->phone_number : '01711';
//        $post_data['cus_email'] = $cart_json->cus_email ?? $order->user->email;
//        $post_data['cus_add1'] = $cart_json->cus_addr1 ?? $student->address;
//        $post_data['cus_add2'] = "";
//        $post_data['cus_city'] = "";
//        $post_data['cus_state'] = "";
//        $post_data['cus_postcode'] = $cart_json->postal_code;
//        $post_data['cus_country'] = @$student->country->country_name ?? 'BD';
//        $post_data['cus_phone'] = $phone;
//        $post_data['cus_fax'] = "";
//
//        # SHIPMENT INFORMATION
//        $post_data['ship_name'] = get_option('app_name') ?? 'LMS Store';
//        $post_data['ship_add1'] = $cart_json->cus_addr1 ?? $student->address;
//        $post_data['ship_add2'] =  $cart_json->cus_addr1 ?? $student->address;
//        $post_data['ship_city'] =  $cart_json->cus_addr1 ?? $student->address;
//        $post_data['ship_state'] =  $cart_json->cus_addr1 ?? $student->address;
//        $post_data['ship_postcode'] = $cart_json->postal_code ?? $student->postal_code;
//        $post_data['ship_phone'] = $phone;
//        $post_data['ship_country'] = @$student->country->country_name ?? 'BD';
//
//        $post_data['shipping_method'] = "NO";
//        $post_data['product_name'] = "Course Buy";
//
//        $post_data['product_profile'] = "digital-goods";
//
//        # OPTIONAL PARAMETERS
//        $post_data['value_a'] = "ref001";
//        $post_data['value_b'] = "ref002";
//        $post_data['value_c'] = "ref003";
//        $post_data['value_d'] = "ref004";
//
//        $object = [
//            'id' => $order->uuid,
//            'payment_method' => SSLCOMMERZ,
//            'currency' => get_option('sslcommerz_currency')
//        ];
//
//        $getWay = new BasePaymentService($object);
//        $responseData = $getWay->makePayment($total,$post_data);
//        if($responseData['success']){
//            $order->payment_id = $responseData['payment_id'];
//            $order->save();
//            return Redirect::away($responseData['redirect_url']);
//        }else{
//            $this->showToastrMessage('error', 'Something went wrong!');
//            return redirect()->back();
//        }
//dd($responseData);
//
//    }
//
//    public function success(Request $request)
//    {
//        DB::beginTransaction();
//        try {
//            $this->logger->log('Sslcommerz Success Start', '------------------------');
//            if($request->input('tran_id') == 'FAILED'){
//                DB::rollBack();
//                $this->logger->log('Sslcommerz error end', 'Faild');
//                $this->showToastrMessage('error', 'Something is wrong! Payment Failed');
//                return redirect(route('main.index'));
//            }
//            $order = Order::whereUuid($request->input('tran_id'))->first();
//
//            $this->logger->log('Sslcommerz', 'Payment for this order');
//            $this->logger->log('Sslcommerz', json_encode($order));
//
//            $order->payment_status = 'paid';
//            $order->grand_total_with_conversation_rate = ($order->sub_total + $order->platform_charge) * $order->conversion_rate;
//            $order->save();
//            $this->logger->log('Sslcommerz Success Start', 'payment status become paid');
//
//            /* Start:: Create transaction, affiliate history, user balance increment/decrement */
//            foreach ($order->items as $order_item) {
//                $this->logger->log('Sslcommerz', 'transaction created for Earning via sell');
//                createTransaction($order_item->owner_user_id, $order_item->owner_balance, TRANSACTION_SELL, 'Earning via sell', 'Order_item (' . $order_item->id .')');
//                $owner_user = User::find($order_item->owner_user_id);
//                $this->logger->log('Sslcommerz', 'owner');
//                $this->logger->log('Sslcommerz', json_encode($owner_user));
//                if ($owner_user) {
//                    $owner_user->increment('balance', decimal_to_int($order_item->owner_balance));
//                    $this->logger->log('Sslcommerz amount', decimal_to_int($order_item->owner_balance));
//                    $this->logger->log('Sslcommerz', 'balance increment');
//                    $this->logger->log('Order Item' , json_encode($order_item) );
//                }
//
//                $affiliateHistory = AffiliateHistory::whereOrderItemId($order_item->id)->first();
//                if ($affiliateHistory) {
//                    $refUser = User::find($affiliateHistory->user_id);
//                    $this->logger->log('Sslcommerz ref user', json_encode($refUser));
//                    $refUser->increment('balance', decimal_to_int($affiliateHistory->commission));
//                    $this->logger->log('Sslcommerz ref', 'balance increment');
//                    $this->logger->log('Sslcommerz amount' , decimal_to_int($affiliateHistory->commission ));
//                    createTransaction($refUser->id,$affiliateHistory->commission,TRANSACTION_AFFILIATE,AFFILIATE_NARRATION);
//                    $this->logger->log('Sslcommerz', 'transaction created for affiliate');
//                    $affiliateHistory->status = 1;
//                    $affiliateHistory->save();
//                }
//            }
//            $this->logger->log('Sslcommerz Success end', '----------------------');
//            DB::commit();
//        }catch (\Exception $e){
//            DB::rollBack();
//            $this->logger->log('Sslcommerz error end', $e->getMessage());
//            $this->showToastrMessage('error', 'Something is wrong! Try again.');
//            return redirect(route('main.index'));
//        }
//
//        /* End:: Create transaction, affiliate history, user balance increment/decrement */
//        /** ====== Send notification =========*/
//        $text = __("New student enrolled");
//        $target_url = route('instructor.all-student');
//        foreach ($order->items as $item) {
//            if ($item->course) {
//                $this->send($text, 2, $target_url, $item->course->user_id);
//            }
//        }
//
//        $text = __("Course has been sold");
//        $this->send($text, 1, null, null);
//
//        /** ====== Send notification =========*/
//
//        $this->showToastrMessage('success', 'Payment has been completed');
//        return redirect()->route('student.thank-you');
//    }
//
//    public function fail(Request $request)
//    {
//        $order = Order::whereUuid($request->input('tran_id'))->first();
//        $order->error_msg = $request->input('error');
//        $order->save();
//
//        $this->showToastrMessage('error', 'Something is wrong! Try again.');
//        return redirect(route('main.index'));
//    }
//
//    public function cancel(Request $request)
//    {
//        $order = Order::whereUuid($request->input('tran_id'))->first();
//        $order->error_msg = $request->input('error');
//        $order->save();
//        $this->showToastrMessage('success', 'Your request has been cancel.');
//        return redirect(route('main.index'));
//    }
//
//    public function ipn(Request $request)
//    {
////        $order = Order::whereUuid($request->input('tran_id'))->first();
////        $order->payment_method = 'sslcommerz';
////        $order->save();
//
//        $this->showToastrMessage('success', 'Payment has been completed');
//        return redirect(route('student.my-learning'));
//    }
    /*
        * sslcommerz  end
        */

    private function placeOrder($payment_method)
    {
        DB::beginTransaction();
        try{
            $carts = CartManagement::whereUserId(@Auth::user()->id)->get();
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->order_number = rand(100000, 999999);
            $order->sub_total = $carts->sum('price');
            $order->discount = $carts->sum('discount');
            $order->platform_charge = get_platform_charge($carts->sum('price'));
            $order->current_currency = get_currency_code();
            $order->grand_total = $order->sub_total + $order->platform_charge;
            $order->payment_method = $payment_method;

            $payment_currency = '';
            $conversion_rate = '';

            if ($payment_method == 'paypal') {
                $payment_currency = get_option('paypal_currency');
                $conversion_rate = get_option('paypal_conversion_rate') ? get_option('paypal_conversion_rate') : 0;
            } elseif ($payment_method == 'stripe') {
                $payment_currency = get_option('stripe_currency');
                $conversion_rate = get_option('stripe_conversion_rate') ? get_option('stripe_conversion_rate') : 0;
            } elseif ($payment_method == 'bank') {
                $payment_currency = get_option('bank_currency');
                $conversion_rate = get_option('bank_conversion_rate') ? get_option('bank_conversion_rate') : 0;
            } elseif ($payment_method == 'mollie') {
                $payment_currency = get_option('mollie_currency');
                $conversion_rate = get_option('mollie_conversion_rate') ? get_option('mollie_conversion_rate') : 0;
            } elseif ($payment_method == 'instamojo') {
                $payment_currency = get_option('im_currency');
                $conversion_rate = get_option('im_conversion_rate') ? get_option('im_conversion_rate') : 0;
            } elseif ($payment_method == 'paystack') {
                $payment_currency = get_option('paystack_currency');
                $conversion_rate = get_option('paystack_conversion_rate') ? get_option('paystack_conversion_rate') : 0;
            } elseif ($payment_method == 'sslcommerz') {
                $payment_currency = get_option('sslcommerz_currency');
                $conversion_rate = get_option('sslcommerz_conversion_rate') ? get_option('sslcommerz_conversion_rate') : 0;
            }

            $order->payment_currency = $payment_currency;
            $order->conversion_rate = $conversion_rate;
            if ($conversion_rate) {
                $order->grand_total_with_conversation_rate = ($order->sub_total + $order->platform_charge) * $conversion_rate;
            }

            $order->save();

            foreach ($carts as $cart) {
                if ($cart->course_id) {
                    $order_item = new Order_item();
                    $order_item->order_id = $order->id;
                    $order_item->user_id = Auth::id();
                    $order_item->course_id = $cart->course_id;
                    $order_item->owner_user_id = $cart->course ? $cart->course->user_id : null;
                    $order_item->unit_price = $cart->price;
                    if (get_option('sell_commission')) {
                        $order_item->admin_commission = admin_sell_commission($cart->price);
                        $order_item->owner_balance = $cart->price - admin_sell_commission($cart->price);
                        $order_item->sell_commission = get_option('sell_commission');
                    } else {
                        $order_item->owner_balance = $cart->price;
                    }
                    $order_item->save();
                    $this->addAffiliateHistory($cart,$order,$order_item);

                } elseif ($cart->bundle_id) {
                    /*
                     If bundle course add. we only calculate all things in order_items 1 time.
                        and all bundle courses save in order_items table.
                     If any course of bundle already purchased with paid. Those course won't be added again.
                     */
                    $order_item = new Order_item();
                    $order_item->order_id = $order->id;
                    $order_item->user_id = Auth::user()->id;
                    $order_item->bundle_id = $cart->bundle_id;
                    $order_item->owner_user_id = $cart->bundle ? $cart->bundle->user_id : null;
                    $order_item->unit_price = $cart->price;
                    if (get_option('sell_commission')) {
                        $order_item->admin_commission = admin_sell_commission($cart->price);
                        $order_item->owner_balance = $cart->price - admin_sell_commission($cart->price);
                        $order_item->sell_commission = get_option('sell_commission');
                    } else {
                        $order_item->owner_balance = $cart->price;
                    }
                    $order_item->type = 3; //bundle course
                    $order_item->save();
                    $this->addAffiliateHistory($cart,$order,$order_item);

                    /*
                     * All bundle course added but not calculate balance, commission etc
                     */
                    foreach ($cart->bundle_course_ids ?? [] as $bundle_course_id) {
                        /*
                        need to add bundle course in order list
                        Old paid course check with bundle course
                        */

                        $paidOrderIds = Order::where('user_id', auth()->id())->where('payment_status', 'paid')->pluck('id')->toArray();
                        $freeOrderIds = Order::where('user_id', auth()->id())->where('payment_status', 'free')->pluck('id')->toArray();
                        $orderIds = array_merge($paidOrderIds, $freeOrderIds);
                        $orderCourseIds = Order_item::whereIn('order_id', $orderIds)->pluck('course_id')->toArray();

                        if (in_array($bundle_course_id, $orderCourseIds) == false){
                            $order_item = new Order_item();
                            $order_item->order_id = $order->id;
                            $order_item->user_id = Auth::user()->id;
                            $order_item->bundle_id = $cart->bundle_id;
                            $order_item->course_id = $bundle_course_id;
                            $order_item->owner_user_id = $cart->bundle->user_id;
                            $order_item->type = 3; //bundle course
                            $order_item->save();
                        }
                    }

                } elseif ($cart->consultation_slot_id) {
                    $order_item = new Order_item();
                    $order_item->order_id = $order->id;
                    $order_item->user_id = Auth::id();
                    $order_item->owner_user_id = is_array($cart['consultation_details']) ? $cart['consultation_details'][0]->instructor_user_id : null;
                    $order_item->consultation_slot_id = $cart->consultation_slot_id;
                    $order_item->consultation_date = $cart->consultation_date;
                    $order_item->unit_price = $cart->price;
                    if (get_option('sell_commission')) {
                        $order_item->admin_commission = admin_sell_commission($cart->price);
                        $order_item->owner_balance = $cart->price - admin_sell_commission($cart->price);
                        $order_item->sell_commission = get_option('sell_commission');
                    } else {
                        $order_item->owner_balance = $cart->price;
                    }
                    $order_item->type = 4;
                    $order_item->save();

                    //Start:: Need to add Booking History
                    $booking = new BookingHistory();
                    $booking->order_id = $order->id;
                    $booking->order_item_id = $order_item->id;
                    $booking->instructor_user_id = is_array($cart['consultation_details']) ? $cart['consultation_details'][0]->instructor_user_id : null;
                    $booking->student_user_id = Auth::id();
                    $booking->consultation_slot_id = $cart->consultation_slot_id;
                    $booking->date = is_array($cart['consultation_details']) ? $cart['consultation_details'][0]->date : null;
                    $booking->day = is_array($cart['consultation_details']) ? $cart['consultation_details'][0]->day : null;
                    $booking->time = is_array($cart['consultation_details']) ? $cart['consultation_details'][0]->time : null;
                    $booking->duration = is_array($cart['consultation_details']) ? $cart['consultation_details'][0]->duration : null;
                    $booking->type = $cart->consultation_available_type;
                    $booking->status = 0; //Pending
                    $booking->save();

                    //End:: Add Booking History
                }

            }
            CartManagement::whereUserId(@Auth::user()->id)->delete();
            DB::commit();
            return ['status' => true,'data' => $order];
        }catch (\Exception $e){
            DB::rollBack();
            $this->logger->log('Cannot Create Order', $e->getMessage());
            return ['status' => false,'data' => null];
        }

    }

    private function addAffiliateHistory($cart, $order, $order_item){
        if(get_option('referral_status')){
            $refRequest = AffiliateRequest::where(['affiliate_code' => $cart->reference,'status' => STATUS_APPROVED])->first();
            if(!is_null($refRequest)) {
                $refUser = User::where(['id' => $refRequest->user_id])->first();
                $alreadyAffiliated = AffiliateHistory::where(['user_id'=>$refUser->id,'course_id' =>$cart->course_id])->first();
                if($refUser->is_affiliator == AFFILIATOR && is_null($alreadyAffiliated)) {
                    $commission = referral_sell_commission($cart->price - $cart->discount);
                    $affiliate = new AffiliateHistory();
                    $affiliate->hash = Str::uuid()->getHex();
                    $affiliate->user_id = $refUser->id;
                    $affiliate->buyer_id = Auth::id();
                    $affiliate->order_id = $order->id;
                    $affiliate->order_item_id = $order_item->id;
                    if ($cart->course_id) {
                        $affiliate->course_id = $cart->course_id;
                    } elseif ($cart->bundle_id) {
                        $affiliate->bundle_id = $cart->bundle_id;
                    }
                    $affiliate->actual_price = $cart->price;
                    $affiliate->discount = $cart->discount;
                    $affiliate->commission = $commission;
                    $affiliate->commission_percentage = get_option('referral_commission_percentage');
                    $affiliate->save();
                }
            }
        }

    }
}
