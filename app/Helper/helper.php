<?php

use App\Models\AffiliateHistory;
use App\Models\BookingHistory;
use App\Models\Bundle;
use App\Models\CartManagement;
use App\Models\Course;
use App\Models\Currency;
use App\Models\ForumPostComment;
use App\Models\Instructor;
use App\Models\InstructorConsultationDayStatus;
use App\Models\Language;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\RankingLevel;
use App\Models\Review;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdraw;
use App\Models\ZoomSetting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



function get_notify()
{

    if(Auth::guard('admins')->check())
        $notifications = \App\Models\Notification::orderBy('id','DESC')
            ->where('user_id', Auth::id())
            ->where('is_seen','no')->get();
    if(Auth::guard('students')->check())
        $notifications = \App\Models\StudentNotification::orderBy('id','DESC')
            ->where('user_id', Auth::guard('students')->id())
            ->where('is_seen','no')->get();
    if(Auth::guard('instructors')->check())
        $notifications = \App\Models\InstructorNotification::orderBy('id','DESC')
            ->where('user_id', Auth::guard('instructors')->id())
            ->where('is_seen','no')->get();
    if(Auth::guard('parents')->check())
        $notifications = \App\Models\ParentNotification::orderBy('id','DESC')
            ->where('user_id', Auth::guard('parents')->id())
            ->where('is_seen','no')->get();
    return $notifications;
}


function get_goals_today()
{
    $goals = \App\Models\Goal::where('target_evaluation_date',\Carbon\Carbon::now()->toDateString())
        ->get();

    if($goals->count() > 0 ){
        $notify = \App\Models\Notification::where('type',2)
            ->where('is_seen','no')->first();

        if (!$notify)
            \App\Models\Notification::create([
                'user_id' => 1,
                'sender_id' => 1,
                'type' => 2,
                'text' => 'يوجد تقييم اليوم',
            ]);
    }
    return  \App\Models\Notification::where('type',2)->count();

}

function get_calenders_today()
{
   $calender =  \App\Models\Calender::where('start',\Carbon\Carbon::now()->toDateString())
        ->get();
   if($calender->count() > 0)
   {
       $notify = \App\Models\Notification::where('type',4)
           ->where('is_seen','no')->first();
       if (!$notify)
           \App\Models\Notification::create([
               'user_id' => 1,
               'sender_id' => 1,
               'type' => 4,
               'text' => 'لديك مهام اليوم',
           ]);
   }
    return  \App\Models\Notification::where('type',4)->count();

}


function get_absence_notify()
{

    $collect_student = collect([]);
    $students = \App\Models\Student::all();
    foreach($students as $student){
        $isSeries = false;
        $previousDate = null;
        $times=0;
        foreach ($student->absences as $absence){
            if ($previousDate !== null) {
                $currentDate = \Carbon\Carbon::parse($absence->date);
                if ($currentDate->diffInDays($previousDate) == 1) {
                    $isSeries = true;
                    $times++;
                    if($times <= get_setting('validate_abscent_times')??0)
                        $isSeries = false;

                }
                else
                    $isSeries = false;
            }
            $previousDate = \Carbon\Carbon::parse($absence->date);


        }
        if ($isSeries) {
            $collect_student->push($student);
        }

    }

    if ($collect_student->count() > 0) {
            foreach ($collect_student as $student) {
                $notify = \App\Models\Notification::where('type',1) ->first();
                if (!$notify)
                    \App\Models\Notification::create([
                        'user_id' => 1,
                        'sender_id' => 1,
                        'type' => 1,
                        'text' => get_setting('warning_abscent_text')??0,
                    ]);
            }
    }
    return  \App\Models\Notification::where('type',1)->count();
}

function get_follow_up_rsponse($followup_id,$question)
{

    $response = \App\Models\FollowupResponses::where('followup_id',$followup_id)
        ->where('question',$question)->first();
    return $response?->response;
}

function get_subscription_notify()
{

    $students = collect([]);
    $subps =  \App\Models\StudentSubscription::get();
    foreach ($subps as $subp){
        $paid_to = \Carbon\Carbon::parse($subp->created_at)->addMonth($subp->rec_time)
            ->addDays(get_setting('warning_late_subscription_time'))->toDateString();

        if($paid_to < Carbon\Carbon::today())
        {
            $students->push($subp->student);
        }
    }

    if ($students->count() > 0) {
        foreach ($students as $student) {
            $notify = \App\Models\Notification::where('type',3)
               ->first();
            if (!$notify)
                \App\Models\Notification::create([
                    'user_id' => 1,
                    'sender_id' => 1,
                    'type' => 3,
                    'text' => get_setting('warning_subscription_text'),

                ]);
        }
    }

    return  \App\Models\Notification::where('type',3)->count();
}

function get_late_subscription_notify()
{
    $students = \App\Models\Student::whereHas('students_subscriped',function ($q){
        $q->where('payment_status' , 'unpaid')->where('active_days' ,'<=', 30 - get_setting('warning_late_subscription_time'));
    })->get();


    if ($students->count() > 0) {
        foreach ($students as $student) {
            $notify = \App\Models\Notification::where('text',get_setting('warning_late_subscription_text'))->first();
            if (!$notify)
                \App\Models\Notification::create([
                    'user_id' => 1,
                    'sender_id' => 1,
                    'text' => get_setting('warning_late_subscription_text'),

                ]);
        }
    }
}

function get_welcome_notify()
{
    $today = now()->format('Y-m-d'); // Get today's date in 'Y-m-d' format

    $students = \App\Models\Student::whereDate('created_at','>=', $today)->get();


    if ($students->count() > 0) {
        foreach ($students as $student) {
            $notify = \App\Models\Notification::where('text',get_setting('welcome_text'))
                ->where('is_seen','no')->first();
            if (!$notify)
                \App\Models\Notification::create([
                    'user_id' => 1,
                    'sender_id' => 1,
                    'text' => get_setting('welcome_text'),

                ]);
        }
    }
}


if (!function_exists('api_asset')) {
    function api_asset($id)
    {
        if (($asset = \App\Models\Upload::find($id)) != null) {
            return asset($asset->file_name);
        }
        return "";
    }
}

function staticMeta($id)
{
    $meta = \App\Models\Meta::find($id);
    $metaData = [];
    if ($meta)
    {
        $metaData['title'] = $meta->meta_title;
        $metaData['meta_description'] = $meta->meta_description;
        $metaData['meta_keyword'] = $meta->meta_keyword;
    }

    return $metaData;
}

function active_if_match($path)
{
    if (class_basename(auth::user()) == 'Admin'){
        return Request::is('*'.$path.'*') ? 'mm-active' : '';
    } else {
        return Request::is('*'.$path.'*') ? 'mm-active' : '';
    }

}

function get_review($student,$question)
{
    $students_reveiws = $student->students_reveiws;
    $answer = $students_reveiws->where('question',$question)->first()?->answer;
    return $answer;

}


function active_if_full_match($path)
{
    if (class_basename(auth::user()) == 'Admin'){
        return Request::is($path) ? 'mm-active' : '';
    } else {
        return Request::is($path) ? 'mm-active' : '';
    }

}

function open_if_full_match($path)
{
    return Request::is($path) ? 'has-open' : '';
}


function toastrMessage($message_type, $message)
{
    Toastr::$message_type($message, '', ['progressBar' => true, 'closeButton' => true, 'positionClass' => 'toast-top-right']);
}

function get_option($option_key)
{
    $system_settings = config('settings');

    if ($option_key && isset($system_settings[$option_key])) {
        return $system_settings[$option_key];
    } else {
        return null;
    }
}

function get_my_option($option_key)
{
    $setting = Auth::user()->my_settings->where('type',$option_key)->first();
    return $setting?->value;
}

function zoom_status()
{
    $zoom = ZoomSetting::whereUserId(Auth::id())->first();
    $status = 0;
    if ($zoom){
        $status = $zoom->status;
    }

    return $status;
}

//function get_default_language()
//{
//    $language = Language::where('default_language', 'on')->first();
//    if ($language)
//    {
//        $iso_code = $language->iso_code ;
//        return $iso_code;
//    }
//
//    return 'en';
//}

function get_currency_symbol()
{
    $currency = Currency::where('current_currency', 'on')->first();
    if ($currency)
    {
        $symbol = $currency->symbol;
        return $symbol;
    }

    return '';
}

function get_currency_code()
{
    $currency = Currency::where('current_currency', 'on')->first();
    if ($currency)
    {
        $currency_code = $currency->currency_code;
        return $currency_code;
    }

    return '';
}

function get_currency_placement()
{
    $currency = Currency::where('current_currency', 'on')->first();
    $placement = 'before';
    if ($currency)
    {
        $placement = $currency->currency_placement;
        return $placement;
    }

    return $placement;
}

function get_platform_charge($sub_total)
{
    return ($sub_total * get_option('platform_charge')) / 100;
}

function admin_sell_commission($amount)
{
    return ($amount * get_option('sell_commission')) / 100;
}
function referral_sell_commission($amount)
{
    return ($amount * get_option('referral_commission_percentage')) / 100;
}

function userBalance($userId=null){
    if($userId == null){
        return int_to_decimal(Auth::user()->balance);
    }
    $user = User::find($userId);
    return int_to_decimal($user->balance);
}

function instructor_available_balance()
{
    //Start::  Cancel Consultation Money Calculation
    $cancelConsultationOrderItemIds = BookingHistory::whereStatus(2)->where('send_back_money_status', 1)->whereHas('order', function ($q){
        $q->where('payment_status', 'paid');
    })->pluck('order_item_id')->toArray();
    $orderItems = Order_item::whereIn('id', $cancelConsultationOrderItemIds);
    $cancel_consultation_money = $orderItems->sum('admin_commission') + $orderItems->sum('owner_balance');
    //Start::  Cancel Consultation Money Calculation

    $total_balance = Order_item::where('owner_user_id', Auth::id())->whereHas('order', function ($q) {
        $q->where('payment_status', 'paid');
    })->sum('owner_balance');
    $total_withdraw_balance = Withdraw::where('user_id', auth()->user()->id)->whereIn('status', [0, 1])->sum('amount');
    $available_balance = $total_balance - $total_withdraw_balance - $cancel_consultation_money;
    return number_format($available_balance, 2);
}


function get_number_format($amount)
{
    return number_format($amount, 2,'.','');
}

function decimal_to_int($amount)
{
    return number_format(number_format($amount, 2, '.','')*100,0,'.','');
}
function int_to_decimal($amount)
{
    return number_format($amount/100, 2,'.','');
}

function createTransaction($user_id, $amount, $type, $narration, $reference=null)
{
    $trn = new Transaction();
    $trn->hash = Str::uuid()->getHex();
    $trn->user_id = $user_id;
    $trn->amount = $amount;
    $trn->narration = $narration;
    $trn->type = $type;
    $trn->reference = $reference;
    $trn->save();
}

//function appLanguages()
//{
//    return Language::where('status', 1)->get();
//}
function appLanguages()
{
    $languages = Language::where('status', 1)->get();

    if ($languages->isEmpty()) {
        // return a default language object
        return new Language([
            'iso_code' => 'en',
            'name' => 'English',
            // add other properties as needed
        ]);
    }

    return $languages;
}

function selectedLanguage()
{
    $language = Language::where('iso_code', config('app.locale'))->first();
    if (!$language){
        $language = Language::find(1);
        if ($language){
            $ln = $language->iso_code;
            session(['local' => $ln]);
            App::setLocale(session()->get('local'));
        } else {
            // Set default language
            $ln = 'en';
            session(['local' => $ln]);
            App::setLocale(session()->get('local'));
            $language = Language::where('iso_code', $ln)->first();
        }
    }

    return $language;
}

//    function selectedLanguage()
//    {
//
//        $language = Language::where('iso_code', config('app.locale'))->first();
//        if (!$language){
//            $language = Language::find(1);
//            if ($language){
//                $ln = $language->iso_code;
//                session(['local' => $ln]);
//                App::setLocale(session()->get('local'));
//            }
//        }
//
//        return $language;
//    }

function take_exam($exam_id)
{
    if (\App\Models\Take_exam::whereUserId(auth()->user()->id)->whereExamId($exam_id)->count() > 0) {
        return 'yes';
    } else {
        return 'no';
    }
}


function get_answer_class($exam_id, $question_id, $question_option_id)
{
    if (\App\Models\Answer::whereUserId(auth()->user()->id)->whereExamId($exam_id)->whereQuestionId($question_id)->whereQuestionOptionId($question_option_id)->count() > 0) {
        $answer = \App\Models\Answer::whereUserId(auth()->user()->id)->whereExamId($exam_id)->whereQuestionId($question_id)->whereQuestionOptionId($question_option_id)->orderBy('id', 'DESC')->first();
        if ($answer->is_correct == 'yes') {
            return 'given-answer-right';
        } else {
            return 'given-answer-wrong';
        }
    } else {
        $option = \App\Models\Question_option::find($question_option_id);
        if ($option->is_correct_answer == 'yes') {
            return 'correct-answer-was';
        } else {
            return '';
        }
    }
}

function get_total_score($exam_id)
{
    $exam = \App\Models\Exam::find($exam_id);
    return $exam->marks_per_question * $exam->questions->count();
}

function get_student_score($exam_id)
{
    $exam = \App\Models\Exam::find($exam_id);
    $number_of_correct_answer = \App\Models\Answer::whereUserId(auth()->user()->id)->whereExamId($exam_id)->whereIsCorrect('yes')->count();
    return $exam->marks_per_question * $number_of_correct_answer;
}

function get_student_by_student_score($exam_id, $user_id)
{
    $exam = \App\Models\Exam::find($exam_id);
    $number_of_correct_answer = \App\Models\Answer::whereUserId(auth()->user()->id)->whereExamId($exam_id)->whereIsCorrect('yes')->count();
    return $exam->marks_per_question * $number_of_correct_answer;
}

function get_position($exam_id)
{
    $take_exams = \App\Models\Take_exam::whereExamId($exam_id)->orderBy('number_of_correct_answer', 'DESC')->get();
    $list = [];
    foreach ($take_exams as $key => $take_exam) {
        $list[$take_exam->user_id] = $key + 1;
    }

    if (array_key_exists(auth()->user()->id, $list)) {
        return $list[auth()->user()->id];
    } else {
        return '0';
    }


}

function get_instructor_ranking_level($instructor_id)
{
    $userCourseIds = Course::whereUserId($instructor_id)->pluck('id')->toArray();
    $userBundleIds = Bundle::whereUserId($instructor_id)->pluck('id')->toArray();

    $orderBundleItemsCount = Order_item::whereIn('bundle_id', $userBundleIds)->where('course_id', null)
        ->whereYear("created_at", now()->year)->whereMonth("created_at", now()->month)
        ->whereHas('order', function ($q) {
            $q->where('payment_status', 'paid');
        })->count();

    $allOrderItems = Order_item::whereIn('course_id', $userCourseIds)->orWhereIn('bundle_id', $userBundleIds)->whereHas('order', function ($q) {
        $q->where('payment_status', 'paid');
    });

    $grand_total_earning = $allOrderItems->sum('owner_balance');
    $grand_total_enroll = $allOrderItems->count('id') - $orderBundleItemsCount;

    $levels = RankingLevel::orderBy('serial_no', 'asc')->get();
    $rankLevel = true;
    foreach (@$levels as $level) {
        if ($level->earning <= $grand_total_earning && $level->student <= $grand_total_enroll) {
            $level_serial_no = $level->serial_no;
            $rankLevel = false;
        }
    }

    if ($rankLevel) {
        return null;
    } else {
        $next_level = \App\Models\RankingLevel::where('serial_no', @$level_serial_no)->first();
        return $next_level->name;
    }

}

function getImageFile($file)
{
    return asset($file);
}

function getVideoFile($file)
{
    if($file == '' || $file == null) {
        return null;
    }

    try {
        if (env('STORAGE_DRIVER') == "s3") {
            if (Storage::disk('s3')->exists($file)) {
                $s3 = Storage::disk('s3');
                return $s3->url($file);
            }
        }
    } catch (Exception $e) {

    }

    return asset($file);
}

function notificationForUser()
{
    $instructor_notifications = \App\Models\Notification::where('user_id', auth()->user()->id)->where('user_type', 2)->where('is_seen', 'no')->orderBy('created_at', 'DESC')->get();
    $student_notifications = \App\Models\Notification::where('user_id', auth()->user()->id)->where('user_type', 3)->where('is_seen', 'no')->orderBy('created_at', 'DESC')->get();
    return array('instructor_notifications' => $instructor_notifications, 'student_notifications' => $student_notifications);
}

function adminNotifications()
{
    return \App\Models\Notification::where('user_type', 1)->where('is_seen', 'no')->orderBy('created_at', 'DESC')->paginate(5);
}

function studentCourseProgress($course_id)
{
    $number_of_total_lecture = \App\Models\Course_lecture::where('course_id', $course_id)->count();
    $number_of_total_view_lecture = \App\Models\Course_lecture_views::where('course_id', $course_id)->where('user_id', auth()->user()->id)->count();
    $result = 0;
    if ($number_of_total_lecture) {
        $result = (($number_of_total_view_lecture * 100) / $number_of_total_lecture ?? 1);
    }

    return $result;
}


function getLeftDuration($start_date, $end_date)
{
    $startDate = date('d-m-Y H:i:s', strtotime($start_date));
    $endDate = date('d-m-Y H:i:s', strtotime($end_date));

    $secondsDifference = strtotime($endDate) - strtotime($startDate);

    //converting seconds to hours, minutes, seconds.
    $day = floor($secondsDifference / 86400);
    $hour = floor(($secondsDifference - ($day * 86400)) / 3600);
    $minute = floor(($secondsDifference / 60) % 60);
    $second = floor($secondsDifference % 60);

    if ($day > 0) {
        $day = $day . ($day > 1 ? ' days ' : ' day ');
        if ($hour > 0) {
            $hour = $hour . ($hour > 1 ? ' hours ' : ' hour ');
            return $day . $hour;
        }
        return $day;
    } elseif ($hour > 0) {
        $hour = $hour . ($hour > 1 ? ' hours ' : ' hour ');
        if ($minute) {
            $minute = $minute . ($minute > 1 ? ' minutes ' : ' minute ');
            return $hour . $minute;
        }
        return $hour;
    } elseif ($minute > 0) {
        $minute = $minute . ($minute > 1 ? ' minutes ' : ' minute ');
        return $minute;
    } elseif ($second > 0) {
        return $second;
    }

}

function lessonVideoDuration($course_id, $lesson_id)
{
    $lectures = \App\Models\Course_lecture::where('course_id', $course_id)->where('lesson_id', $lesson_id)->get();
    $video_duration = 0;
    $total_video_duration_in_seconds = 0;

    if ($lectures->count() > 0)
    {
        foreach ($lectures as $lecture)
        {
            if ($lecture->file_duration_second)
            {
                $total_video_duration_in_seconds +=  $lecture->file_duration_second;
            }
        }

        $h = floor($total_video_duration_in_seconds / 3600);
        $m = floor($total_video_duration_in_seconds % 3600 / 60 );
        $s = floor($total_video_duration_in_seconds % 3600 % 60);

        if($h > 0){
            return "$h h $m m $s s";
        } elseif ($m > 0) {
            return "$m min $s sec";
        } elseif ($s > 0) {
            return "$s sec";
        }
    }

    return $video_duration;
}

function checkStudentCourseView($course_lecture_views, $course_id, $lecture_id)
{
    $views = $course_lecture_views->where('course_id', $course_id)->where('course_lecture_id', $lecture_id)->first();

    return $views;
}

function studentCoursesCount($user_id)
{
    $allUserOrder = Order::where('user_id', $user_id);
    $paidOrderIds = $allUserOrder->where('payment_status', 'paid')->pluck('id')->toArray();

    $allUserOrder = Order::where('user_id', $user_id);
    $freeOrderIds = $allUserOrder->where('payment_status', 'free')->pluck('id')->toArray();

    $orderIds = array_merge($paidOrderIds, $freeOrderIds);

    $orderItems = Order_item::whereIn('order_id', $orderIds)->count();

    return $orderItems;
}

function countUserReplies($user_id=null)
{
    return ForumPostComment::whereUserId($user_id)->count();
}

function getDayAvailableStatus($day)
{
    $item = InstructorConsultationDayStatus::where('user_id', Auth::id())->where('day', $day)->first();
    if ($item){
        $status = 1;
    } else {
        $status = 0;
    }

    return $status;
}

function getInstructorTotalReview($user_id)
{
    $courseIds = Course::where('user_id', $user_id)->pluck('id')->toArray();
    return Review::whereIn('course_id', $courseIds)->count();
}

function getInstructorName($id)
{
    $user = Instructor::whereUserId($id)->first();
    return @$user->full_name ?? '';
}

function getBookingHistoryDetails($consultation_slot_id)
{
    $booking = BookingHistory::where('consultation_slot_id', $consultation_slot_id)->first();
    $bookingArray = [
        'time' => $booking->time ?? '',
        'type' => $booking->type ?? ''
    ];

    return $bookingArray;
}

function getBundleDetails($id)
{
    $bundle = Bundle::find($id);
    return $bundle;
}

function getUserAverageRating($user_id)
{
    $courseIds = Course::where('user_id', $user_id)->pluck('id')->toArray();

    $data['five_star_count'] = Review::whereIn('course_id', $courseIds)->whereRating(5)->count();
    $data['four_star_count'] = Review::whereIn('course_id', $courseIds)->whereRating(4)->count();
    $data['three_star_count'] = Review::whereIn('course_id', $courseIds)->whereRating(3)->count();
    $data['two_star_count'] = Review::whereIn('course_id', $courseIds)->whereRating(2)->count();
    $data['first_star_count'] = Review::whereIn('course_id', $courseIds)->whereRating(1)->count();

    $data['total_reviews'] = (5 * $data['five_star_count']) + (4 * $data['four_star_count']) + (3 * $data['three_star_count']) +
        (2 * $data['two_star_count']) + (1 * $data['first_star_count']);
    $data['total_user_review'] = $data['five_star_count'] + $data['four_star_count'] + $data['three_star_count'] + $data['two_star_count'] + $data['first_star_count'];

    if ($data['total_user_review'] > 0) {
        $average_rating = $data['total_reviews'] / $data['total_user_review'];
    } else {
        $average_rating = 0;
    }

    return $average_rating;
}

function courseStudents($course_id)
{
    $paidOrderIds = Order_item::where('course_id', $course_id)->whereHas('order', function ($q){
        $q->where('payment_status', 'paid');
    })->count();

    $freeOrderIds = Order_item::where('course_id', $course_id)->whereHas('order', function ($q){
        $q->where('payment_status', 'free');
    })->count();

    $total_course_students = $paidOrderIds + $freeOrderIds;
    return $total_course_students;
}

function getCourseAffiliateAmount($course_id)
{
    return AffiliateHistory::where(['course_id' => $course_id, 'status' => AFFILIATE_HISTORY_STATUS_PAID])->sum('commission');
}

function cart_total_with_conversion_rate($payment_method,$carts=null){
    if(is_null($carts)){
        $carts = CartManagement::whereUserId(@Auth::user()->id)->get();
    }
    $grand_total = get_platform_charge($carts->sum('price'))+$carts->sum('price');

    if ($payment_method == 'paypal') {
        $conversion_rate = get_option('paypal_conversion_rate') ? get_option('paypal_conversion_rate') : 0;
    } elseif ($payment_method == 'stripe') {
        $conversion_rate = get_option('stripe_conversion_rate') ? get_option('stripe_conversion_rate') : 0;
    } elseif ($payment_method == 'bank') {
        $conversion_rate = get_option('bank_conversion_rate') ? get_option('bank_conversion_rate') : 0;
    } elseif ($payment_method == 'mollie') {
        $conversion_rate = get_option('mollie_conversion_rate') ? get_option('mollie_conversion_rate') : 0;
    } elseif ($payment_method == 'instamojo') {
        $conversion_rate = get_option('im_conversion_rate') ? get_option('im_conversion_rate') : 0;
    } elseif ($payment_method == 'paystack') {
        $conversion_rate = get_option('paystack_conversion_rate') ? get_option('paystack_conversion_rate') : 0;
    }  elseif ($payment_method == 'sslcommerz') {
        $conversion_rate = get_option('sslcommerz_conversion_rate') ? get_option('sslcommerz_conversion_rate') : 0;
    }

    return $grand_total*$conversion_rate;
}

function giveAffiliateCommission($order){
    foreach ($order->items as $order_item) {
        createTransaction($order_item->owner_user_id, $order_item->owner_balance, TRANSACTION_SELL, 'Earning via sell', 'Order_item (' . $order_item->id . ')');
        $owner_user = User::find($order_item->owner_user_id);
        if ($owner_user) {
            $owner_user->increment('balance', decimal_to_int($order_item->owner_balance));
        }

        $affiliateHistory = AffiliateHistory::whereOrderItemId($order_item->id)->first();
        if ($affiliateHistory) {
            $refUser = User::find($affiliateHistory->user_id);
            $refUser->increment('balance', decimal_to_int($affiliateHistory->commission));
            createTransaction($refUser->id, $affiliateHistory->commission, TRANSACTION_AFFILIATE, AFFILIATE_NARRATION);
            $affiliateHistory->update(['status' => AFFILIATE_HISTORY_STATUS_PAID]);
        }
    }
}

if (!function_exists('getSlug')) {
    function getSlug($text)
    {
        if($text){
            $data = preg_replace("/[~`{}.'\"\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\|\\\]/", "", $text);
            $slug = preg_replace("/[\/_|+ -]+/", "-", $data);
            return $slug;
        }
        return '';
    }
}

if (!function_exists('get_setting')) {
    function get_setting($key)
    {
        $value = \App\Models\Setting::where('option_key',$key)->first()->option_value;
        return $value;
    }
}

