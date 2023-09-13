<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use App\Models\Absence;
use App\Models\Blog;
use App\Models\Course;
use App\Models\Course_lecture;
use App\Models\Course_lesson;
use App\Models\Employee;
use App\Models\Student;
use App\Models\Admin as Users;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
//use WpOrg\Requests\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['total_students'] = Student::count();
        $data['new_students'] = Student::where('created_at','>','2020' )->count();
        $data['excluded_students'] = Student::where('status','3')->count();
        $data['converted_students'] = Student::where('status','4')->count();
        $data['absence_students'] = Absence::count();
        $data['total_employees'] = Employee::where('status',1)->count();
        $data['total_courses'] = Course::where('status',1)->count();
        $data['total_admins'] = Users::where('status',1)->count();

        $data['total_best_courses'] = Course::with(['reviews' => function ($query) {
        $query->orderBy('rating', '>' ,'3');
            }])->count();

        return view('admin.dashboard', $data);
    }

}
