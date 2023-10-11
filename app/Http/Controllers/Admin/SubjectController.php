<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Course_lecture;
use App\Models\Course_lesson;
use App\Models\Department;
use App\Models\Instructor;
use App\Models\InstructorSubject;
use App\Models\Subject;
use App\Tools\Repositories\Crud;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use App\Traits\SendNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    use General, ImageSaveTrait, SendNotification;
    protected $model, $lectureModel, $lessonModel;

    public function __construct(Subject $subject)
    {
        $this->model = new Crud($subject);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subjects = InstructorSubject::query()->orderBy('id','DESC');
        if($request->search_key)
            $subjects->where('name','like','%'.$request->search_key.'%');
        $subjects = $subjects->paginate(25);
        return view('admin.subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['departments'] = Department::all();
        $data['instructors'] = Instructor::where('status',1)->get();
        return view('admin.subject.create',$data);
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
        $subject = Subject::create([
            "name" => $request->subject_name,
            "department_id" => $request->department_id,
        ]);

        $subject->instructor()->sync($request->instructor_id);

        return redirect()->route('admin.subject.index');
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
        $data['departments'] = Department::all();
        $subject = Subject::find($id);
        $data['instructors'] = Instructor::where('status',1)->get();
        return view('admin.subject.edit',$data,compact('subject'));
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
        $subject = Subject::find($id);
        $subject->update([
            "name" => $request->subject_name,
            "department_id" => $request->department_id,
            ]);

        $subject->instructor()->sync($request->instructor_id);
        return redirect()->route('admin.subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
        $subject->delete();
    }
}
