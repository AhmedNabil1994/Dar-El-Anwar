<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\Followup;
use App\Models\Instructor;
use App\Models\Subject;
use Illuminate\Http\Request;

class FollowupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //.
        $data['followups'] = Followup::query();
        $data['classes'] = ClassRoom::all();
        $data['instructors'] = Instructor::where('status',1)->get();
        $data['subjects'] = Subject::all();
        if($request->followup_date)
            $data['followups']->where('created_at',$request->followup_date);
        if($request->filterByInstructor)
            $data['followups']->where('instructor_id',$request->filterByInstructor);
        if($request->filterByClass)
            $data['followups']->where('class_id',$request->filterByClass);
        if($request->filterBySubject)
            $data['followups']->where('subject_id',$request->filterBySubject);
        $data['followups'] = $data['followups']->paginate(25);
        return view('admin.followup.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['classes'] = ClassRoom::all();
        $data['instructors'] = Instructor::where('status',1)->get();
        $data['subjects'] = Subject::all();
        return view('admin.followup.add',$data);

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
        Followup::create([
            "class_id" => $request->class_id,
            "instructor_id" => $request->teacher_id,
            "subject_id" => $request->subject_id,
            "status" => $request->status,
            "type" => $request->type,
        ]);
        return redirect()->route('admin.followup.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function show(Followup $followup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function edit(Followup $followup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Followup $followup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Followup $followup)
    {
        //
        $followup->delete();
        return redirect()->route('admin.followup.index');
    }
}
