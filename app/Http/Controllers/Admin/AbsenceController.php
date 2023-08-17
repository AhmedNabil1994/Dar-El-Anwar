<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Admin;
use App\Models\ClassRoom;
use App\Models\Department;
use App\Models\Instructor;
use App\Models\Student;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
//
        $absences = Absence::query()->with('student')->orderBy('id','DESC');

        if($request->dateFrom || $request->dateTo)
            $absences->whereBetween('created_at', [$request->dateFrom, $request->dateTo])->get();
        if($request->filterByDept)
            $absences->where('department',$request->filterByDept);
        if($request->filterByClass)
            $absences->where('class',$request->filterByClass);
        if($request->filterBySubject)
            $absences->where('subject_id',$request->filterBySubject);
        if($request->filterByInst)
            $absences->where('teacher',$request->filterByInst);
//        if($request->filterByCode)
//            $absences->where('code',$request->filterByCode);
        if($request->filterByStudent)
            $absences->where('student',$request->filterByStudent);

        $instructors = Instructor::whereStatus(1)->get();
        $data['departments'] = Department::all();
        $data['class_rooms'] = ClassRoom::all();
        $data['subjects'] = Subject::all();
        $data['filter_students'] = Student::whereStatus(1)->get();
        $data['codes'] = Student::whereStatus(1)->pluck('code');
        $students = $absences->pluck('student');
        // Create a new paginator instance manually
        $currentPage = Paginator::resolveCurrentPage('page'); // Get the current page from the request
        $students = new Paginator(
            $students->forPage($currentPage, 25), // Paginate the student data
            $students->count(), // Total number of items
            25, // Items per page
            $currentPage // Current page
        );


        return view('admin.absence.view',$data,compact('students','instructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $students = Student::query();
        $instructors = Instructor::all();
        $students = $students->paginate(10);
        return view('admin.absence.list',compact('students','instructors'));
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
        $student = Student::find($request->student_id);
       if($request->is_checked == 'true')
       {
           Absence::create([
               'date' => Carbon::today()->format('d/m/y'),
               'department' => $student->department,
               'class' => $student->classroom,
               'teacher' => $request->instructor_id,
               'student' => $student->id,
               'is_absent' => 1,
           ]);
       }else{
           Absence::where('student',$student->id)->first()->delete();
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function show(Absence $absence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function edit(Absence $absence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absence $absence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absence $absence)
    {
        //
    }
}
