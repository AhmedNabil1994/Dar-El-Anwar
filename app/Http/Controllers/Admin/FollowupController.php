<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\Followup;
use App\Models\FollowupQuestions;
use App\Models\FollowupResponses;
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
        $data['followups'] = Followup::query()->orderBy('id',"DESC");
        $data['classes'] = ClassRoom::all();
        $data['instructors'] = Instructor::where('status',1)->get();
        $data['subjects'] = Subject::all();
        if($request->dateFrom || $request->dateTo)
            $data['followups']->whereBetween('created_at', [$request->dateFrom, $request->dateTo])->get();
        if($request->followup_date)
            $data['followups']->where('followup_date',$request->followup_date);
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
    public function createClass()
    {
        //
        $data['classes'] = ClassRoom::all();
        $data['instructors'] = Instructor::where('status',1)->get();
        $data['subjects'] = Subject::all();
        $data['questions'] = FollowupQuestions::where('followup_id','follow_up_teacher')->get();
        return view('admin.followup.add_report_class',$data);

    }

    public function createQuran()
    {
        //
        $data['classes'] = ClassRoom::all();
        $data['instructors'] = Instructor::where('status',1)->get();
        $data['subjects'] = Subject::all();
        $data['questions'] = FollowupQuestions::where('followup_id','follow_up_quran')->get();
        return view('admin.followup.add_report_quran',$data);

    }

    public function createReading()
    {
        //
        $data['classes'] = ClassRoom::all();
        $data['instructors'] = Instructor::where('status',1)->get();
        $data['subjects'] = Subject::all();
        $data['questions'] = FollowupQuestions::where('followup_id','follow_up_reading')->get();
        return view('admin.followup.add_report_reading',$data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeClass(Request $request)
    {
        //
        $questions = $request->q;
        $followup = Followup::create([
            "class_id" => $request->class_id,
            "instructor_id" => $request->teacher_id,
            "subject_id" => $request->subject_id,
            "class_number" => $request->class_number,
            "time_working" => $request->time_working,
            "observer" => $request->observer,
            "date" => $request->followup_date,
            "type" => '[1]',
        ]);
        foreach($questions as $question)
            FollowupResponses::create([
                "followup_id" =>$followup->id,
                "question" =>$question,
                "response" =>$request->$question,
            ]);
        return redirect()->route('admin.followup.index')->with('success','تمت اضافة المتابعة');
    }

    public function storeReading(Request $request)
    {
        //

        $questions = $request->q;
        $followup = Followup::create([
            "class_id" => $request->class_id,
            "instructor_id" => $request->teacher_id,
            "subject_id" => $request->subject_id,
            "class_number" => $request->class_number,
            "time_working" => $request->time_working,
            "observer" => $request->observer,
            "date" => $request->followup_date,
            "type" => '[2]',
        ]);
        foreach($questions as $question)
            FollowupResponses::create([
                "followup_id" =>$followup->id,
                "question" =>$question,
                "response" =>$request->$question,
            ]);
        return redirect()->route('admin.followup.index')->with('success','تمت اضافة المتابعة');
    }

    public function storeQuran(Request $request)
    {
        //
        $questions = $request->q;
        $followup = Followup::create([
            "class_id" => $request->class_id,
            "instructor_id" => $request->teacher_id,
            "subject_id" => $request->subject_id,
            "class_number" => $request->class_number,
            "time_working" => $request->time_working,
            "observer" => $request->observer,
            "date" => $request->followup_date,
            "type" => '[3]',
        ]);
        foreach($questions as $question)
            FollowupResponses::create([
                "followup_id" =>$followup->id,
                "question" =>$question,
                "response" =>$request->$question,
            ]);
        return redirect()->route('admin.followup.index')->with('success','تمت اضافة المتابعة');
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
    public function editClass(Followup $followup)
    {
        //
        $data['classes'] = ClassRoom::all();
        $data['instructors'] = Instructor::where('status',1)->get();
        $data['subjects'] = Subject::all();
        $data['questions'] = FollowupQuestions::where('followup_id','follow_up_teacher')->get();
        $data['followup'] = $followup;
        return view('admin.followup.edit_report_class',$data);
    }

    public function editQuran(Followup $followup)
    {
        //
        $data['classes'] = ClassRoom::all();
        $data['instructors'] = Instructor::where('status',1)->get();
        $data['subjects'] = Subject::all();
        $data['followup'] = $followup;
        return view('admin.followup.edit_report_quran',$data);

    }

    public function editReading(Followup $followup)
    {
        //
        $data['classes'] = ClassRoom::all();
        $data['instructors'] = Instructor::where('status',1)->get();
        $data['subjects'] = Subject::all();
        $data['questions'] = FollowupQuestions::where('followup_id','follow_up_reading')->get();
        $data['followup'] = $followup;
        return view('admin.followup.edit_report_reading',$data);

    }

    public function change_status(Request $request){
        $followup = Followup::find($request->followup_id);
        if ($followup->status == 1  )
            $followup->update(['status' => 0]);
        else
            $followup->update(['status' => 1]);
        return 'success';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function updateClass(Request $request, Followup $followup)
    {
        //
        $questions = $request->questions;
        $followup->update([
            "class_id" => $request->class_id,
            "instructor_id" => $request->teacher_id,
            "subject_id" => $request->subject_id,
            "status" => $request->status,
            "type" => $request->type,
            "class_number" => $request->class_number,
            "time_working" => $request->time_working,
            "observer" => $request->observer,
            "followup_date" => $request->followup_date,
        ]);
        foreach($followup->followup_responses as $resp){
            $resp->delete();
        }
        foreach($questions as $key => $question)
            FollowupResponses::create([
                "folowup_id" => $followup->id,
                "question_id" =>$key+1,
                "response" =>$question,
            ]);
        return redirect()->route('admin.followup.index');
    }

    public function updateQuran(Request $request, Followup $followup)
    {
        //
        $questions = $request->questions;
        $followup->update([
            "class_id" => $request->class_id,
            "instructor_id" => $request->teacher_id,
            "subject_id" => $request->subject_id,
            "status" => $request->status,
            "type" => $request->type,
            "class_number" => $request->class_number,
            "time_working" => $request->time_working,
            "observer" => $request->observer,
            "followup_date" => $request->followup_date,
        ]);

        foreach($followup->followup_responses as $resp){
            $resp->delete();
        }

        foreach($questions as $key => $question)
            FollowupResponses::create([
                "folowup_id" => $followup->id,
                "question_id" =>$key+25,
                "response" =>$question,
            ]);
        return redirect()->route('admin.followup.index');
    }


    public function updateReading(Request $request, Followup $followup)
    {
        //
        $questions = $request->questions;
        $followup->update([
            "class_id" => $request->class_id,
            "instructor_id" => $request->teacher_id,
            "subject_id" => $request->subject_id,
            "status" => $request->status,
            "type" => $request->type,
            "class_number" => $request->class_number,
            "time_working" => $request->time_working,
            "observer" => $request->observer,
            "followup_date" => $request->followup_date,
        ]);
        foreach($followup->followup_responses as $resp){
            $resp->delete();
        }
        foreach($questions as $key => $question)
            FollowupResponses::create([
                "folowup_id" => $followup->id,
                "question_id" =>$key+14,
                "response" =>$question,
            ]);
        return redirect()->route('admin.followup.index');
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
