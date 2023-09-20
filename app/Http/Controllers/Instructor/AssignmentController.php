<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use App\Models\Assignment;
use App\Models\ClassRoom;
use App\Models\Department;
use App\Models\Instructor;
use App\Models\Notification;
use App\Models\rc;
use App\Models\Student;
use App\Models\StudentDuties;
use App\Models\StudentNotification;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Assign;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */


    public function list(Request $request)
    {
        $data['all_subjects'] = Subject::query()
            ->where('instructor_id',Auth::guard('instructors')->id());


        $data['assignment_count'] = Assignment::where('instructor_id',Auth::guard('instructors')->id())->pluck('name');
        $data['all_subjects'] = $data['all_subjects']->paginate(25);

        return view('instructor.assignment.index',$data);
    }

    public function index()
    {

        $data['assignments'] = Assignment::whereStatus(1)
            ->where('instructor_id',Auth::guard('instructors')->id())->paginate(25);
        return view('instructor.assignment.list',$data);
    }
    public function student_index(Request $request)
    {
        //

        $data['all_subjects'] = Subject::query()->where('instructor_id',Auth::guard('instructors')->id());
        $data['count'] = Student::count();
        $data['departments'] = Department::all();
        $data['class_rooms'] = ClassRoom::all();
        $data['subjects'] = Subject::where('instructor_id',Auth::guard('instructors')->id())->get();
        $data['assignments'] = Assignment::where('instructor_id',Auth::guard('instructors')->id())->get();
            $data['filter_students'] = Student::whereStatus(1)->get();
        $data['instructors'] = Instructor::whereStatus(1)->get();
        if($request->filterByDept)
            $data['all_subjects']->where('department_id',$request->filterByDept);
        if($request->filterByClass)
            $data['all_subjects']->whereHas('student',function ($q) use($request)
            {
                $q->where('class_room_id',$request->filterByClass);
            });
        if($request->filterBySubject)
            $data['all_subjects']->where('id',$request->filterBySubject);

        if($request->filterByStudent)
            $data['all_subjects']->where('student',$request->filterByStudent);
        $data['all_subjects'] = $data['all_subjects']->paginate(25);
        return view('instructor.assignment.student.list',$data);
    }

    public function create()
    {
        $data['subjects'] = Subject::where('instructor_id',Auth::guard('instructors')->id())->get();
        return view('instructor.assignment.create',$data);
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


    public function store_assignment(Request $request)
    {
        $assignment = Assignment::create([
            'name' => $request->name,
            'subject_id' => $request->subject_id,
            'instructor_id' => Auth::guard('instructors')->id(),
        ]);

        return redirect()->route('instructor.assignments.index')->with('success','تمت اضافة واجب');
    }

    public function store(Request $request)
    {
        $assignment = Assignment::find($request->assignment_id);
        foreach ($request->checks as $student){
            $assignment->student()->sync($student);
            StudentNotification::create([
                'user_id' => 1,
                'text' => 'تم اضافة واجب لك',
                'sender_id' => $student,
            ]);
        }


        return redirect()->route('instructor.assignments.student.index')->with('success','تمت اضافة واجب');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_mark(Request $request)
    {
        //
        $mark = $request->markInput;
        $student = $request->student_id;
        $assignment_id = $request->assignment_id;
        $assignment = StudentDuties::where('student_id',$student)
                    ->where('assignment_id',$assignment_id)->first();

        $assignment->update([ "marks" =>$mark]);

        return redirect()->back()->with('success','تمت اضافة الدرجة');

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
