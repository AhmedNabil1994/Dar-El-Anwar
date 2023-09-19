<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\ClassRoom;
use App\Models\Department;
use App\Models\Instructor;
use App\Models\rc;
use App\Models\Student;
use App\Models\StudentDuties;
use App\Models\Subject;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['students'] = Student::query()->whereStatus(1)->paginate(25);
        $data['count'] = Student::count();
        $data['departments'] = Department::all();
        $data['class_rooms'] = ClassRoom::all();
        $data['subjects'] = Subject::all();
            $data['filter_students'] = Student::whereStatus(1)->get();
        $data['instructors'] = Instructor::whereStatus(1)->get();
        if($request->dateFrom || $request->dateTo)
            $data['students']->whereBetween('created_at', [$request->dateFrom, $request->dateTo])->get();
        if($request->filterByDept)
            $data['students']->where('department',$request->filterByDept);
        if($request->filterByClass)
            $data['students']->where('class',$request->filterByClass);
        if($request->filterBySubject)
            $data['students']->where('subject_id',$request->filterBySubject);
        if($request->filterByInst)
            $data['students']->where('teacher',$request->filterByInst);

        if($request->filterByStudent)
            $data['students']->where('student',$request->filterByStudent);

        return view('admin.assignment.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function student_duties($id)
    {
        //
        $data['students_duties'] = StudentDuties::query()->orderBy('id','DESC')
                                    ->where('student_id',$id);
        $data['students_duties'] = $data['students_duties']->paginate(25);
        return view('admin.assignment.students.list',$data);
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
        $mark = $request->markInput;
        $student = $request->student_id;
        $assignment_id = $request->assignment_id;
        $subject = $request->subject_id;
        $dept = $request->dept_id;
        $instructor = $request->instructor_id;

        $assignment = Assignment::where('student_id',$student)
                    ->where('subject_id',$subject)
                    ->where('instructor_id',$instructor)
                    ->where('department_id',$dept)->first();

        if(!$assignment) {
            $marks = [
                $assignment_id =>  $mark,
            ];
            $marks = json_encode($marks);

            $assignment = Assignment::create([
                "student_id" => $student,
                "subject_id" => $subject,
                "department_id" => $dept,
                "instructor_id" => $instructor,
                "marks" => $marks,
            ]);
        }
        else {
            $old_marks = json_decode($assignment->marks);

            $old_marks->$assignment_id = $mark;

            $old_marks = json_encode($old_marks);
            $assignment->update([ "marks" =>$old_marks]);
        }

        return redirect()->route('admin.assignments.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function show(rc $rc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function edit(rc $rc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rc $rc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function destroy(rc $rc)
    {
        //
    }
}
