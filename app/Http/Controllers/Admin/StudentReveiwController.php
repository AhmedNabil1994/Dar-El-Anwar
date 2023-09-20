<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Student;
use App\Models\StudentReveiw;
use Illuminate\Http\Request;

class StudentReveiwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create($id)
    {
        //
        $data['student'] = Student::find($id);
        $data['departments'] = Department::whereStatus(1)->get();
        return view('admin.student.review.create',$data);
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
        if($student->students_reveiws->count() > 0)
        {
            foreach ($request->question as $question)
            {
                $exist = $student->students_reveiws->where('question',$question)->first();
                if($exist){
                    $exist->update([
                        'answer' => $request->$question
                    ]);
                }
                else{
                    StudentReveiw::create([
                        'student_id' => $request->student_id,
                        'question' => $question,
                        'answer' => $request->$question,
                    ]);
                }

            }
        }

        return redirect()->route('review.create',$request->student_id)->with('success','تم اضافة التقييم');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentReveiw  $studentReveiw
     * @return \Illuminate\Http\Response
     */
    public function show(StudentReveiw $studentReveiw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentReveiw  $studentReveiw
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentReveiw $studentReveiw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentReveiw  $studentReveiw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentReveiw $studentReveiw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentReveiw  $studentReveiw
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentReveiw $studentReveiw)
    {
        //
    }
}
