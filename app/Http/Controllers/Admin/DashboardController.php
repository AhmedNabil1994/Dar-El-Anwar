<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use App\Models\Absence;
use App\Models\Blog;
use App\Models\ClassRoom;
use App\Models\Course;
use App\Models\Course_lecture;
use App\Models\Course_lesson;
use App\Models\Employee;
use App\Models\Student;
use App\Models\Admin as Users;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\StudentSubscription;
use App\Models\Subject;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Termwind\Components\Raw;
use function Clue\StreamFilter\fun;

//use WpOrg\Requests\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['total_students'] = Student::count();
        $data['new_students'] = Student::where('status',1 )->count();
        $data['excluded_students'] = Student::where('status','3')->count();
        $data['converted_students'] = Student::where('status','4')->count();
        $data['absence_students'] = Absence::distinct('student_id')->count();
        $data['total_employees'] = Employee::where('status',1)->count();
        $data['total_courses'] = Course::where('status',1)->count();
        $data['total_best_courses'] = Course::with(['reviews' => function ($query) {
            $query->orderBy('rating', '>' ,'3');
        }])->where('status',1)->count();
        $data['total_admins'] = Users::where('status',1)->count();
        $data['total_incomes_month'] = Transaction::query()
                                        ->select('date',\DB::raw('sum(amount) as count'))
                                        ->groupBy('date')->where('transaction_type','income')->get();
        $data['total_expenses_month'] = Transaction::query()
            ->select('date',\DB::raw('sum(amount) as count'))
            ->groupBy('date')->where('transaction_type','expense')->get();
        $data['total_sales'] = Transaction::query()
            ->select('date',\DB::raw('sum(amount) as count'))
            ->groupBy('date')->where('transaction_type','expense')
            ->whereNotNull('product_id')->get();
        $data['total_get_money']  = 0;
        $total_data = StudentSubscription::where('payment_status','paid')->get();
        foreach ($total_data as $item){
            $data['total_get_money'] += $item->rec_time * $item->subscription->value;
        }
        $data['percentage_of_students'] = Student::query()->select('status',\DB::raw('count(*) as count'))
            ->where('status','!=',2)
            ->groupBy('status')->get();
        return view('admin.dashboard', $data);
    }


    public function student_dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['total_subscription'] = Auth::guard('students')->user()->subscriptions->count();
        $data['total_subjects'] = Subject::whereHas('student',function ($q){
            $q->where('students.id',Auth::guard('students')->user()->id);
        })->count();
        $data['class_room'] = ClassRoom::whereStatus(1)
            ->whereHas('students',function ($q){
                $q->where('id',Auth::guard('students')->id());
            })->count();
        $data['courses'] = Course::whereHas('student_courses',function ($student) {
            $student->where('student_id',\Illuminate\Support\Facades\Auth::guard('students')->id());
        })->whereStatus(1)->count();

        return view('student.dashboard', $data);
    }

    public function calender()
    {
        return view('admin.common.apps-calendar');
    }

}
