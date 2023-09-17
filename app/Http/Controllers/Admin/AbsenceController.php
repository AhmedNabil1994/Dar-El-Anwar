<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absence;
use App\Models\Admin;
use App\Models\ClassRoom;
use App\Models\Department;
use App\Models\Instructor;
use App\Models\Level;
use App\Models\Student;
use App\Models\StudentSubject;
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
        $absences = Absence::query()->orderBy('id', 'DESC');

        if ($request->dateFrom)
            $absences->where('date', $request->dateFrom);
        if ($request->filterByDept)
            $absences->where('department_id', $request->filterByDept);
        if ($request->filterByClass)
            $absences->where('level_id', $request->filterByClass);
        if ($request->filterBySubject)
            $absences->where('subject_id', $request->filterBySubject);
        if ($request->filterByInst)
            $absences->where('instructor_id', $request->filterByInst);
        if ($request->filterByCode)
            $absences->whereHas('student', function ($query) use ($request) {
                $query->where('code', $request->filterByCode);
            });
        if ($request->filterByStudent)
            $absences->where('student_id', $request->filterByStudent);

        $instructors = Instructor::whereStatus(1)->get();
        $data['departments'] = Department::all();
        $data['class_rooms'] = ClassRoom::all();
        $data['subjects'] = Subject::all();
        $data['filter_students'] = Student::whereStatus(1)->get();
        $data['codes'] = Student::whereStatus(1)->pluck('code');
        $absences = $absences->paginate(25);

        return view('admin.absence.view', $data, compact('absences', 'instructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        //
        $data['students_subjects'] = StudentSubject::query()->orderBy('id', 'DESC');

        if ($request->dateFrom || $request->dateTo)
            $data['students_subjects']->whereBetween('created_at', [$request->dateFrom, $request->dateTo])->get();
        if ($request->filterByDept)
            $data['students_subjects']->whereHas('subject', function ($q) use ($request) {
                $q->where('department_id', $request->filterByDept);
            });
        if ($request->filterByClass)
            $data['students_subjects']->whereHas('student', function ($q) use ($request) {
                $q->where('level_id', $request->filterByClass);
            });;
        if ($request->filterBySubject)
            $data['students_subjects']->where('subject_id', $request->filterBySubject);
        if ($request->filterByInst)
            $data['students_subjects']->whereHas('subject', function ($q) use ($request) {
                $q->where('instructor_id', $request->filterByInst);
            });
        if ($request->filterByCode)
            $data['students_subjects']->whereHas('student', function ($query) use ($request) {
                $query->where('code', $request->filterByCode);
            });
        if ($request->filterByStudent)
            $data['students_subjects']->where('student_id', $request->filterByStudent);

        $instructors = Instructor::whereStatus(1)->get();
        $data['departments'] = Department::all();
        $data['class_rooms'] = Level::all();
        $data['subjects'] = Subject::all();
        $data['filter_students'] = Student::whereStatus(1)->get();
        $data['codes'] = Student::whereStatus(1)->pluck('code');
        $data['students_subjects'] = $data['students_subjects']->paginate(25);

        return view('admin.absence.create', $data, compact('instructors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $student_subject = StudentSubject::find($request->student_subject);

        $abscent_student = Absence::where('date',$request->date)
            ->where('student_subjects_id', $request->student_subject)
            ->first();
        if($abscent_student)
            return redirect()->back()->with('error','تم تسجيل غياب الطالب مسبقا بهذه المادة في نفس الميعاد');

        $abscent_student = Absence::where('student_subjects_id', $request->student_subject)
            ->first();

        if($abscent_student)
            $student_subject->update([
                'abscence_count' => $student_subject->abscence_count + 1
            ]);
        $absence = Absence::create([
            'date' => $request->date,
            'time' => $request->time,
            'department_id' => $student_subject->subject?->department->id,
            'level_id' => $student_subject->student?->level?->id,
            'instructor_id' => $request->instructor_id,
            'student_subjects_id' => $request->student_subject,
            'student_id' => $student_subject->student?->id,
        ]);


        return redirect()->back()->with('success','تم تسجيل غياب الطالب');
    }

    public function delete(Request $request,$id)
    {
        //

        $abscent_student = Absence::find($id);

        $abscent_student->student_subject->update([
            'abscence_count' => $abscent_student->student_subject->abscence_count - 1
        ]);
        $abscent_student->delete();



        return redirect()->back()->with('success','تم الغاء غياب الطالب');
    }

}
