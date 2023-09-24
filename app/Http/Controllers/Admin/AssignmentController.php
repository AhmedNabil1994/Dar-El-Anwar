<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\ClassRoom;
use App\Models\Department;
use App\Models\Instructor;
use App\Models\rc;
use App\Models\Student;
use App\Models\StudentDuties;
use App\Models\StudentNotification;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{

    public function student_store(Request $request)
    {
        $assignment = Assignment::find($request->assignment_id);
        foreach ($request->checks as $student){
            $assignment->student()->sync($student);
            StudentNotification::create([
                'user_id' => $student,
                'text' => 'تم اضافة واجب لك',
                'sender_id' => 1,
            ]);
        }


        return redirect()->back()->with('success','تمت اضافة واجب للطالب');
    }

    public function student_list(Request $request)
    {
        $data['all_subjects'] = Subject::query()->orderBy('id','DESC');
        $data['count'] = Student::count();
        $data['departments'] = Department::all();
        $data['class_rooms'] = ClassRoom::all();
        $data['subjects'] = Subject::all();
        $data['assignments'] = Assignment::all();
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
        return view('admin.assignment.assignment.index',$data);
    }
    public function listing()
    {
        $data['assignments'] = Assignment::whereStatus(1)->paginate(25);
        return view('admin.assignment.student.list',$data);
    }
    public function assingments_index(Request $request)
    {
        $data['assignments'] = Assignment::whereStatus(1)->orderBy('id','DESC');

        if($request->search){
            $data['assignments']->where('name','like','%'.$request->search.'%');
        }
        $data['assignments'] = $data['assignments']->paginate(25);
        return view('instructor.assignment.assignments.list',$data);
    }
    public function assingments_edit(Request $request,Assignment $assignment)
    {

        $data['subjects'] = Subject::all();
        $data['assignment'] = $assignment;
        return view('admin.assignment.edit',$data);
    }
    public function assingments_delete(Request $request,Assignment $assignment)
    {
        $assignment->delete();
        return redirect()->route('admin.assignments.assignment.index')->with('success', 'تم حذف الواجب');
    }

    public function assingments_update(Request $request,Assignment $assignment)
    {
        $subject = Subject::find($request->subject_id);
        $assignment->update([
            'name' => $request->name,
            'subject_id' => $request->subject_id,
            'instructor_id' => $subject->instructor?->id,
        ]);
        return redirect()->route('admin.assignments.assignment.index')->with('success', 'تم تعديل الواجب');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['all_subjects'] = Subject::query()->with('student')->orderBy('id','DESC');

        if($request->instructor_id)
            $data['all_subjects']->where('instructor_id',$request->instructor_id);
        if($request->date_to)
            $data['all_subjects']->where('created_at','<=',$request->date_to);
        if($request->date_from)
            $data['all_subjects']->where('created_at','>=',$request->date_from);
        if($request->department_id)
            $data['all_subjects']->where('department_id',$request->department_id);
         if($request->subject_id)
            $data['all_subjects']->where('id',$request->subject_id);




        $data['assignment_count'] = Assignment::all();
        $data['all_subjects'] = $data['all_subjects']->paginate(25);
        $data['instructors'] = Instructor::whereStatus(1)->get();
        $data['departments'] = Department::whereStatus(1)->get();
        $data['classes'] = ClassRoom::whereStatus(1)->get();
        $data['subjects'] = Subject::all();


        return view('admin.assignment.list',$data);
    }

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

    public function create_points(Request $request,Student $student,Subject $subject)
    {
        $data['all_subjects'] = Subject::query()
            ->where('instructor_id',Auth::guard('instructors')->id());


        $data['assignments'] = StudentDuties::query()->where('student_id',$student->id)
            ->whereHas('assignment',function ($q) use ($subject){
                $q->where('subject_id',$subject->id);
            });
        $data['assignments'] = $data['assignments']->paginate(25);

        return view('admin.assignment.student.list',$data);
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
        $subject = Subject::find($request->subject_id);
        $assignment = Assignment::create([
            'name' => $request->name,
            'subject_id' => $request->subject_id,
            'instructor_id' => $subject->instructor?->id,
        ]);
        return redirect()->route('admin.assignments.assignment.index')->with('success', 'تم اضافة الواجب');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rc  $rc
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $data['subjects'] = Subject::all();
        return view('admin.assignment.create',$data);
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
