<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\Course;
use App\Models\Department;
use App\Models\Exam;
use App\Models\ExamsResult;
use App\Models\Goal;
use App\Models\Instructor;
use App\Models\Student;
use App\Models\StudentGoal;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index()
    {
        // Retrieve and display existing goals
        $goals = Goal::query()->orderBy('id', 'DESC'); // Assuming you have a 'Goal' model.
        $goals = $goals->paginate(25);
        $data['departments'] = Department::whereStatus(1)->get();
        $data['subjects'] = Subject::all();
        $data['instructors'] = Instructor::whereStatus(1)->get();
        $data['classes'] = ClassRoom::whereStatus(1)->get();
        $data['exams'] = Exam::all();
        return view('admin.goals.index', $data, ['goals' => $goals]);
    }

    public function create(Request $request)
    {
        $data['students'] = Student::query();
        if ($request->filterBydept)
            $data['students']->whereHas('dept', function ($q) use ($request) {
                $q->where('departments.id', $request->filterBydept);
            });
        if ($request->filterBySubject)
            $data['students']->whereHas('subjects', function ($q) use ($request) {
                $q->where('subjects.id', $request->filterBysubject);
            });
        if ($request->class_id && $request->filterByInstructor)
            $data['students']
                ->where('class_room_id', $request->class_id)
                ->whereHas('subjects', function ($q) use ($request) {
                    $q->where('instructor_id', $request->filterByInstructor);
                });
        if ($request->filterByCourse)
            $data['students']->whereHas('courses', function ($q) use ($request) {
                $q->where('courses.id', $request->filterByCourse);
            });
        $data['students'] = $data['students']->get();
        $data['departments'] = Department::whereStatus(1)->get();
        $data['subjects'] = Subject::all();
        $data['instructors'] = Instructor::whereStatus(1)->get();
        $data['classes'] = ClassRoom::whereStatus(1)->get();
        $data['courses'] = Course::whereStatus(1)->get();
        $data['exams'] = Exam::all();
        return view('admin.goals.create', $data);
    }

    public function store(Request $request)
    {
        foreach ($request->goal_name as $key => $goal_name) {
            $goal = Goal::where('name',$goal_name)
                ->where('department_id',$request->dept)
                ->where('target_evaluation_date',$request->target_date)
                ->where('instructor_id',$request->instructor)
                ->where('class_room_id',$request->class_id)
                ->where('course_id',$request->course)
                ->where('subject_id',$request->subject)
                ->where('created_at',$request->date)
                ->where('exam_id',$request->exam_id)
                ->first();
            if($goal){
                StudentGoal::create([
                    'student_id' => $request->student_id[$key],
                    'goal_id' => $goal->id,
                    'notes' => $request->notes[$key],
                ]);
            }
            else{
                $goal = Goal::create([
                    'name' => $goal_name,
                    'department_id' => $request->dept,
                    'target_evaluation_date' => $request->target_date,
                    'instructor_id' => $request->instructor,
                    'class_room_id' => $request->class_id,
                    'course_id' => $request->course,
                    'subject_id' => $request->subject,
                    'created_at' => $request->date,
                    'exam_id' => $request->exam_id,
                ]); // Create a new goal record in the database.
                StudentGoal::create([
                    'student_id' => $request->student_id[$key],
                    'goal_id' => $goal->id,
                    'notes' => $request->notes[$key],
                ]);
            }


        }
        return redirect()->back()->with('success', 'تم اضافة الهدف');
    }

    public function generateReport(Request $request)
    {
        // Generate and display reports based on user selection
        // Get the start and end dates from the user input
        $startDate = Carbon::parse($request->input('start_date'));
        $endDate = Carbon::parse($request->input('end_date'));

        // Query the database to fetch goals within the specified date range
        $reportData = DB::table('goals')
            ->whereBetween('date', [$startDate, $endDate])
            ->get();

        return view('admin.goals.report', ['reportData' => $reportData]);
    }

    public function index_review(Request $request)
    {

        // Retrieve and display existing goals
        $data['goals'] = Goal::query()->orderBy('id', 'DESC')
        ->whereHas('students_goals',function ($q){
            $q->where('status',1);
        });

        if ($request->filterByClass)
            $data['goals']->where('class_room_id',$request->filterByClass);
        if ($request->filterByCourse)
            $data['goals']->where('course_id',$request->filterByCourse);
        if ($request->filterByInstructor)
            $data['goals']->where('instructor_id',$request->filterByInstructor);
        if ($request->date)
            $data['goals']->where('target_evaluation_date',$request->date);
        if ($request->goal_id)
            $data['goals']->where('id',$request->goal_id);


        $data['goals'] = $data['goals']->paginate(25);

        $data['classes'] = ClassRoom::whereStatus(1)->get();
        $data['courses'] = Course::whereStatus(1)->get();
        $data['instructors'] = Instructor::whereStatus(1)->get();
        $data['filter_goals'] = Goal::all();

        return view('admin.goals.review.index', $data);
    }

    public function create_review(Request $request,Goal $goal)
    {
        $data['goal'] = $goal;

        $data['students'] = $goal->students;
        if($data['students']->count() <= 0)
            return redirect()->route('admin.goals.index.review');
        return view('admin.goals.review.create', $data);
    }

    public function create_student_review(Request $request,Student $student, Goal $goal)
    {
        $data['student'] = $student;
        $data['exam'] = $goal->exam;
        $data['questions'] = $data['exam']->questions;
        $data['goal'] = $goal;
        $data['exam_results'] = ExamsResult::where('student_id',$student->id)
            ->where('goal_id',$goal->id)->get();
        return view('admin.goals.review.student.create', $data);
    }

    public function store_student_review(Request $request)
    {
        if(!$request->question)
            return redirect()->back()->with('error','لا يوجد اختبار');
        foreach ($request->question as $key => $question){
            ExamsResult::create([
                'question_id' => $question,
                'goal_id' => $request->goal,
                'exam_id' => $request->exam,
                'student_id' => $request->student,
                'answer' => $request->grade[$key],
                'notes' => $request->notes[$key],
            ]);
        }
        $student_goal = StudentGoal::where('student_id', $request->student)
            ->where('goal_id', $request->goal)->first();
        $student_goal->update([
            'status' => 0
        ]);

        return redirect()->route('admin.goals.create.review',$request->goal)->with('success','تم اضافة التقييم');
    }

}
