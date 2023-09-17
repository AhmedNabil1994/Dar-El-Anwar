<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ParentInfo;
use App\Models\Student;
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
        if($request->from ||     $request->to)
            $data['students_age']->whereBetween('birthdate',[$age_from.'-01-01',$age_to.'-01-01']);
        $data['students_age'] = $data['students_age']->paginate(25);
        return view('admin.reports.students_age',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reportParents(Request $request)
    {
        //
        $data['students'] = Student::query()->whereStatus(1)->orderBy('id','DESC')->paginate(25);

        return view('admin.reports.report_parents',$data);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
