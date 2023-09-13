<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Student;
use App\Models\Department;
use App\Models\Transaction;
use App\Models\Invoice;
use App\Models\StudentSubscription;
use App\Models\Subject;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Handle search filters for child name and subscription name
        $childName = $request->child_name;
        $subscriptionName = $request->subscription_name;

        // Fetch subscriptions based on filters
        $data['subscriptions'] = Subscription::query()->orderBy('id','DESC')
            ->where(function ($query) use ($childName, $subscriptionName) {
                if (!empty($childName)) {
                    $query->whereHas('students', function ($userQuery) use ($childName) {
                        $userQuery->whereIn('name', $childName);
                    });
                }
                if (!empty($subscriptionName)) {
                    $query->whereIn('name', $subscriptionName);
                }
            })->with('students')->paginate(25);

        $data['subjects'] = Subject::all();
        $data['departs'] = Department::where('status',1)->get();
        $data['students'] = \App\Models\Student::where('status',1)->get();
        $data['subscription_names'] = Subscription::where('status',1)->get();

        return view('admin.subscription.list', $data);
    }


    public function students_subscription(Request $request)
    {
        $childName = $request->child_name;
        $subscriptionName = $request->subscription_name;

        // استخدم الفلاتر هنا للبحث باسم الطفل واسم الاشتراك

        $subscriptions = StudentSubscription::query()->orderBy('id','DESC')->where(function ($query) use ($childName, $subscriptionName) {
            // إضافة الشروط هنا للبحث باسم الاشتراك واسم الطفل
            if (!empty($subscriptionName)) {
                $query->whereHas('subscription', function ($userQuery) use ($subscriptionName) {
                    $userQuery->where('name', $subscriptionName);
                });
            }
            if (!empty($childName)) {
                $query->whereHas('student', function ($userQuery) use ($childName) {
                    $userQuery->where('name', $childName);
                });
            }
        })
            ->with('student')
            ->with('subscription')
            ->paginate(25);
        $data['subjects'] = Subject::all();
        $data['departs'] = Department::where('status',1)->get();
        $data['students'] = \App\Models\Student::where('status',1)->get();
        $data['subscription_names'] = Subscription::where('status',1)->get();


        return view('admin.subscription.index', $data,compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.subscription.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        Subscription::create($data);

        return redirect()->route('subscriptions.index')->with('success', 'Subscription created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(StudentSubscription $subscription)
    {
        // Check if the authenticated user has permission to view this subscription
        // You can implement your own authorization logic here, e.g., check if the user is an admin

        // Load the users associated with this subscription
        $student = $subscription->student;

        // Calculate the remaining days of validity based on active_days and purchase date
        $today = now(); // Current date
        $purchaseDate = $subscription->created_at; // Subscription purchase date
        $activeDays = $subscription?->active_days;
        $expirationDate = $purchaseDate->addDays($activeDays); // Calculate the expiration date

        // Check if the subscription is still active
        $isSubscriptionActive = $today->lte($expirationDate) || $subscription->payment_status == 'unpaid';

        // Pass the data to the view
        return view('admin.subscription.show', compact('subscription', 'student', 'isSubscriptionActive', 'expirationDate'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
        return $subscription;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Subscription $subscription)
    {
        //
        $data = $request->all();
        $subscription->update($data);

        return redirect()->route('subscriptions.index')->with('success', 'Subscription created successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //

        $subscription->delete();
        return redirect()->route('subscriptions.index')->with('success', 'Subscription created successfully');

    }



    public function processPaymentWallet(Request $request, StudentSubscription $subscription)
    {
        // Retrieve the subscription based on the $subscription_id

        // Simulate a successful payment (you would replace this with real payment gateway integration)
        $is_paid = $subscription->where('payment_status' , 'unpaid')->exists();

        if ($is_paid) {
            // Update the subscription status to "paid" (you would handle this based on your database structure)
            $wallet =  $subscription->student->wallet;

            if($wallet < 0){
                return redirect()->back()->with('error', __('لا يةجد رصيد في المحفظة'));
            }
            $subscription->student->update([
                'wallet' => $wallet - $subscription->subscription->value,
            ]);
            $last_amount = Transaction::query()
                ->where('date',Carbon::today()->format('Y-m-d'))
                ->orderBy('id','DESC')->first()?->amount;
            $last_amount = $last_amount + $request->amount;
            $data = [
                'trans_no'=>rand(0000,9999),
                'date' => $request->date ?? Carbon::now()->format('Y-m-d'),
                'name' => $subscription->student->name,
                'amount' => $subscription->subscription->value,
                'description' => 'دفع الاشتراك',
                'user_id' => Auth::user()->id,
                'branch_id' => $subscription->student->branch_id,
                'student_id' => $subscription->student->id,
                'transaction_type' => 'income',
                'last_amount' => $last_amount,
            ];

            Transaction::create($data);
            Invoice::create([
                'student_id' => $subscription->student->id,
                'amount' => $subscription->subscription->value,
                'subscription_id' => $subscription->id,
                'classroom' => $subscription->student->class_room?->id,
                'paid_at' => Carbon::now()->format('Y-m-d')
            ]);
            $subscription->update(['payment_status' => 'paid']);



            return redirect()->back()->with('success', 'Payment Success.');
        } else {
            return redirect()->back()->with('error', 'Payment failed.');
        }
    }
    public function processPayment(Request $request, StudentSubscription $subscription)
    {
        // Retrieve the subscription based on the $subscription_id

        // Simulate a successful payment (you would replace this with real payment gateway integration)
        $is_paid = $subscription->where('payment_status' , 'unpaid')->exists();

        if ($is_paid) {
            // Update the subscription status to "paid" (you would handle this based on your database structure)

            $last_amount = Transaction::query()
                ->where('date',Carbon::today()->format('Y-m-d'))
                ->orderBy('id','DESC')->first()?->amount;
            $last_amount = $last_amount + $request->amount;
            $data = [
                'trans_no'=>rand(0000,9999),
                'date' => Carbon::now()->format('Y-m-d'),
                'name' => $subscription->student->name,
                'amount' => $subscription->subscription->value,
                'description' => 'دفع الاشتراك',
                'branch_id' => $subscription->student->branch_id,
                'user_id' => Auth::user()->id,
                'transaction_type' => 'income',
                'last_amount' => $last_amount,
            ];

            Transaction::create($data);
            Invoice::create([
                'student_id' => $subscription->student->id,
                'amount' => $subscription->subscription->value,
                'subscription_id' => $subscription->id,
                'classroom' => $subscription->student->class_room?->id,
                'paid_at' => Carbon::now()->format('Y-m-d')
            ]);
            $subscription->update(['payment_status' => 'paid']);



            return redirect()->back()->with('success', 'Payment Success.');
        } else {
            return redirect()->back()->with('error', 'Payment failed.');
        }
    }
}
