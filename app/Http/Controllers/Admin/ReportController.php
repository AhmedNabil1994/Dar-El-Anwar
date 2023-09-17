<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\ClassRoom;
use App\Models\Department;
use App\Models\Invoice;
use App\Models\Level;
use App\Models\ParentInfo;
use App\Models\Student;
use App\Models\StudentBus;
use App\Models\StudentSubscription;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function reportStudentsAge(Request $request)
    {
        //
        $age_from = Carbon::now()->year - $request->from;
        $age_to = Carbon::now()->year - $request->to;
        $data['students_age'] = Student::query()->whereStatus(1);
        $data['count'] = $data['students_age']->count();
        if($request->student_name)
            $data['students_age']->where('name','LIKE','%'.$request->student_name.'%');
        if($request->birthdate)
            $data['students_age']->where('birthdate',$request->birthdate);
        if($request->period)
            $data['students_age']->where('period',$request->period);
        if($request->from || $request->to)
            $data['students_age']->whereBetween('birthdate',[$age_from.'-01-01',$age_to.'-01-01']);
        $data['students_age'] = $data['students_age']->paginate(25);
        return view('admin.reports.students_age',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function reportParents(Request $request)
    {
        //
        $data['students'] = Student::query()->whereStatus(1);
        if($request->student_name)
            $data['students']->where('name','like','%'.$request->student_name                                                                                           );
        if($request->father_name)
            $data['students']->whereHas('parent', function ($q) use ($request) {
                $q->where('relationship','father')->where('name','like','%'. $request->father_name                                                                                          );
            });
        if($request->mother_name)
            $data['students']->whereHas('parent', function ($q) use ($request) {
                $q->where('relationship','mother')->where('name','like','%'. $request->mother_name                                                                                          );
            });
        $data['students'] = $data['students']->orderBy('id','DESC')->paginate(25);

        return view('admin.reports.report_parents',$data);
    }

    public function reportSubscribtions(Request $request)
    {
        $data['students_subscriptions'] = StudentSubscription::query();
        if($request->date_from || $request->date_to)
            $data['students_subscriptions']->whereBetween('updated_at',[$request->date_from,$request->date_to]);
        if($request->student_name)
            $data['students_subscriptions']->whereHas('student',function ($q) use ($request){
                $q->where('name','like','%'.$request->student_name.'%');
            });
        if($request->department_id)
            $data['students_subscriptions']->whereHas('subscription',function ($q) use ($request){
                $q->where('department_id',$request->department_id);
            });
        if($request->class)
            $data['students_subscriptions']->whereHas('student',function ($q) use ($request){
                $q->where('classroom',$request->class);
            });
        if($request->method)
            $data['students_subscriptions']->whereHas('subscription',function ($q) use ($request){
                $q->where('type',$request->method);
            });
        if($request->subscription_id)
            $data['students_subscriptions']->where('subscription_id',$request->subscription_id);
        if($request->amount)
            $data['students_subscriptions']->whereHas('subscription',function ($q) use ($request){
                $q->where('value',$request->amount);
            });
        $data['students_subscriptions'] = $data['students_subscriptions']->orderBy('id','DESC')->paginate(25);
        $data['dapartments'] = Department::whereStatus(1)->get();
        $data['classes'] = ClassRoom::whereStatus(1)->get();
        $data['subscriptions'] = Subscription::whereStatus(1)->get();
        $data['amounts'] = Subscription::whereStatus(1)->get()->pluck('value');
        $data['students_count'] = Student::whereStatus(1)->count();
        $data['total'] = StudentSubscription::count();
        $data['total_unpaid'] = StudentSubscription::where('payment_status','unpaid')->count();
        $data['total_paid'] = StudentSubscription::where('payment_status','paid')->count();

        return view('admin.reports.report_subscriptions',$data);
    }

    public function reportInvoices(Request $request)
    {
        $data['invoices'] = Invoice::query()->orderBy('id','DESC');
        if($request->student_name)
            $data['invoices']->whereHas('student',function ($q) use ($request){
                $q->where('name','like','%'.$request->student_name.'%');
            });
        if($request->invoice_id)
            $data['invoices']->where('id',$request->invoice_id);
        if($request->date)
            $data['invoices']->where('paid_at',$request->date);
        $data['invoices'] = $data['invoices']->paginate(25);
        return view('admin.reports.report_invoices',$data);
    }

    public function reportStudent(Request $request,$id)
    {
        $data['student'] = Student::find($id);
        return view('admin.reports.report_student',$data);
    }

    public function reportBuses(Request $request)
    {
        $data['students_buses'] = StudentBus::query();
        if($request->bus_id)
            $data['students_buses']->where('bus_id',$request->bus_id);
        if($request->date_from||$request->date_to)
            $data['students_buses']->whereBetween('updated_at',[$request->date_from,$request->date_to]);
        if($request->student_name)
            $data['students_buses']->whereHas('student',function ($q) use ($request){
                $q->where('name','like','%'.$request->student_name.'%');
            });
        if($request->student_name)
            $data['students_buses']->whereHas('student',function ($q) use ($request){
                $q->where('level_id',$request->level_id);
            });
        $data['students_buses'] = $data['students_buses']->paginate(25);
        $data['buses'] = Bus::whereStatus(1)->get();
        $data['levels'] = Level::all();
        return view('admin.reports.report_buses',$data);
    }


    public function reportCountStudent(Request $request)
    {
        $data['department'] = Department::first();
        return view('admin.reports.report_count_students',$data);
    }
}
