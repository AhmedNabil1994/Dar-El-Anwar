<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Instructor\StoreCourseRequest;
use App\Models\Course;
use App\Models\Course_lecture;
use App\Models\Course_lecture_views;
use App\Models\Course_lesson;
use App\Models\CourseUploadRule;
use App\Models\Department;
use App\Models\Instructor;
use App\Models\LearnKeyPoint;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Subscription;
use App\Models\User;
use App\Tools\Repositories\Crud;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use App\Traits\SendNotification;
use Carbon\Carbon;
use Hamcrest\Core\AllOf;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    use General, ImageSaveTrait, SendNotification;
    protected $model, $lectureModel, $lessonModel;

    public function __construct(Course $course, Course_lesson $course_lesson,  Course_lecture $course_lecture)
    {
        $this->model = new Crud($course);
        $this->lectureModel = new Crud($course_lecture);
        $this->lessonModel = new Crud($course_lesson);
    }

    public function index(Request $request)
    {

        $data['title'] = 'All Courses';
        $data['courses'] = Course::query()->orderBy('created_at','DESC');

        // Filter by code if filterByCode is provided in the request
        if ($request->filterByCode) {
            $data['courses']->where('code', $request->input('filterByCode'));
        }

        // Filter by name if filterByName is provided in the request
        if ($request->filterByName) {
            $data['courses']->where('title', $request->input('filterByName'));
        }

        // Filter by instructor if filterByInstructor is provided in the request
        if ($request->filterByInstructor) {
            $data['courses']->where('instructor_id', $request->input('filterByInstructor'));
        }

        // Filter by subject if filterBySubject is provided in the request
        if ($request->filterBySubject) {
            $data['courses']->where('subject_id', $request->input('filterBySubject'));
        }

        // Filter by department if filterBydept is provided in the request
        if ($request->filterBydept) {
            $data['courses']->where('department_id', $request->input('filterBydept'));
        }

        // Filter by content if filterByContent is provided in the request
        if ($request->filterByContent) {
            $data['courses']->where('content','LIKE','%'. $request->input('filterByContent') .'%');
        }

        // Filter by time if filterByTime is provided in the request
        if ($request->filterByTime) {
            $data['courses']->where('time', $request->input('filterByTime'));
        }

        // Filter by price if filterByPrice is provided in the request
        if ($request->filterByPrice) {
            $data['courses']->where('price', $request->input('filterByPrice'));
        }

        // Filter by start date if filterByStartDate is provided in the request
        if ($request->filterByStartDate) {
            $data['courses']->where('date_from', $request->input('filterByStartDate'));
        }

        // Filter by end date if filterByEndDate is provided in the request
        if ($request->filterByEndDate) {
            $data['courses']->where('date_to', $request->input('filterByEndDate'));
        }

        // Filter by count if filterByCount is provided in the request
        if ($request->filterByCount) {
            $data['courses']->where('students_count', $request->input('filterByCount'));
        }

        if ($request->is_best) {
            $data['courses']->where('students_count', '>',10);

        }

        $courses = Course::all();
        $data['codes'] = $courses->whereNotNull('code')->pluck('code');
        $data['titles'] = $courses->whereNotNull('title')->pluck('title');
        $data['instructors'] = Instructor::with('employee')->whereHas('employee', function ($query) {
            $query->where('status', 1);
        })->get();
        $data['subjects'] = Subject::all();
        $data['departments'] = Department::where('status',1)->get();
        $data['contents'] = $courses->whereNotNull('content')->pluck('content');
        $data['prices'] = $courses->whereNotNull('price')->pluck('price');
        $data['times'] = $courses->whereNotNull('time')->pluck('time');
        $data['start_dates'] = $courses->whereNotNull('date_from')->pluck('date_from');
        $data['end_dates'] = $courses->whereNotNull('date_to')->pluck('date_to');
        $data['student_counts'] = $courses->whereNotNull('student_count')->pluck('student_count');

        // Retrieve the filtered courses
        $data['courses'] = $data['courses']->paginate(10); // You can adjust the pagination as needed

        return view('admin.course.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Upload Course';
        $data['navCourseUploadActiveClass'] = 'active';
        $data['rules'] = CourseUploadRule::all();
        $data['departments'] = Department::all();
        $data['instructors'] = Instructor::all();
        $data['subjects'] = Subject::all();

        return view('admin.course.create', $data);
    }


    public function edit(Request $request, Course $course)
    {
        $data['course'] = $course;
        $data['rules'] = CourseUploadRule::all();
        $data['departments'] = Department::all();
        $data['instructors'] = Instructor::all();
        $data['subjects'] = Subject::all();

        return view('admin.course.edit',$data);
    }



    public function view($uuid)
    {
        $data['title'] = "Course Details";
        $data['course'] = $this->model->getRecordByUuid($uuid);

        return view('admin.course.view', $data);
    }

    public function approved()
    {
        if (!Auth::user()->can('approved_course')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Approved Courses';
        $data['courses'] = Course::where('status', 1)->paginate(25);
        return view('admin.course.approved', $data);
    }

    public function reviewPending()
    {
        if (!Auth::user()->can('pending_course')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Review Pending Courses';
        $data['courses'] = Course::where('status', 2)->paginate(25);
        return view('admin.course.review-pending', $data);
    }

    public function hold()
    {
        if (!Auth::user()->can('hold_course')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Hold Courses';
        $data['courses'] = Course::where('status', 3)->paginate(25);
        return view('admin.course.hold', $data);
    }

    public function statusChange($uuid, $status)
    {
        $course = $this->model->getRecordByUuid($uuid);
        $course->status = $status;
        $course->save();

        if ($status == 1) {
            $text = __("Course has been approved");
            $target_url = route('course-details', $course->slug);
            $this->send($text, 2, $target_url, $course->user_id);

            /** ====== send notification to student ===== */
            $students = Student::where('user_id', '!=', $course->user_id)->select('user_id')->get();
            foreach ($students as $student) {
                $text = __("New course has been published");
                $target_url = route('course-details', $course->slug);
                $this->send($text, 3, $target_url, $student->user_id);
            }
            /** ====== send notification to student ===== */
        }

        if ($status == 3) {
            $text = __("Course has been hold");
            $target_url = route('instructor.course');
            $this->send($text, 2, $target_url, $course->user_id);
        }


        $this->showToastrMessage('success', __('Status has been changed'));
        return redirect()->back();

    }

    public function delete(Course $course)
    {
        $course->subscription?->delete();
        $course->subscription_courses()->dump();
        $course->delete();
        $this->showToastrMessage('success', __('Course has been deleted.'));
        return redirect()->back();
    }

    public function courseUploadRuleIndex()
    {
        $data['title'] = 'Courses Upload Rules';
        $data['courseRules'] = CourseUploadRule::all();
        return view('admin.course.upload-rules', $data);
    }

    public function store(Request $request)
    {
        $carbonDate = Carbon::parse($request->date);
        // Get the day of the week as a string (e.g., 'Monday', 'Tuesday')
        $dayOfWeek = $carbonDate->format('l');

        // Alternatively, you can get the day as a numeric representation (0 = Sunday, 1 = Monday, etc.)
        $numericDayOfWeek = $carbonDate->dayOfWeek;

        // You can also get the abbreviated day name (e.g., 'Mon', 'Tue')
        $abbreviatedDayOfWeek = $carbonDate->format('D');

        $course_data = [
            'code' => 'DA-'.uniqid(),
            'title' => $request->title,
            'instructor_id' => $request->instructor_id,
            'subject_id' => $request->subject_id,
            'department_id' => $request->department_id,
            'content' => $request->content,
            'price' => $request->price,
            'time' => $request->date_time,
            'date' => $request->date,
            'status' => $request->status == 1 ? 1 : 0,
            'type' => $request->type,
            'day' => $abbreviatedDayOfWeek,
        ];

        $course = Course::create($course_data);

        Subscription::create([
            'name' => $course_data['title'],
            'course_id' => $course->id,
            'value' => $course_data['price'],
            'department_id' => $course_data['department_id'],
            'subject_id' => $course_data['subject_id'],
            'start_date' => $course_data['date'],
            'status' => $course_data['status'],
        ]);



        return redirect()->route('admin.course.index')->with('success','تمت اضافة الدورة بنجاح');
    }

    public function update(Request $request,Course $course)
    {
        $course_data = [
            'code' => 'DA-'.uniqid(),
            'title' => $request->title,
            'instructor_id' => $request->instructor_id,
            'subject_id' => $request->subject_id,
            'department_id' => $request->department_id,
            'content' => $request->content,
            'price' => $request->price,
            'time' => $request->date_time,
            'date' => $request->date,
            'status' => $request->status == 1 ? 1 : 0,
            'type' => $request->type,
        ];

        $course->update($course_data);
        if($course->subscription){
            $course->subscription->update([
                'name' => $course_data['title'],
                'value' => $course_data['price'],
                'department_id' => $course_data['department_id'],
                'subject_id' => $course_data['subject_id'],
                'start_date' => $course_data['date'],
                'status' => $course_data['status'],
            ]);
        }
        else{
            Subscription::create([
                'name' => $course_data['title'],
                'course_id' => $course->id,
                'value' => $course_data['price'],
                'department_id' => $course_data['department_id'],
                'subject_id' => $course_data['subject_id'],
                'start_date' => $course_data['date'],
                'status' => $course_data['status'],
            ]);

        }




        return redirect()->route('admin.course.index')->with('success','تم تعديل الدورة بنجاح');
    }


    public function courseUploadRuleStore(Request $request)
    {
        $courseUploadRuleTitle = $request->courseUploadRuleTitle;
        if ($courseUploadRuleTitle) {
            $inputs = Arr::except($request->all(), ['_token']);
            $keys = [];

            foreach ($inputs as $k => $v) {
                $keys[$k] = $k;
            }

            foreach ($inputs as $key => $value) {
                $option = Setting::firstOrCreate(['option_key' => $key]);
                $option->option_value = $value;
                $option->save();
            }
        }


        $now = now();
        if ($request['course_upload_rules']) {

            if (count(@$request['course_upload_rules']) > 0) {
                foreach ($request['course_upload_rules'] as $course_upload_rules) {
                    if (@$course_upload_rules['description']) {
                        if (@$course_upload_rules['id']) {
                            $rule = CourseUploadRule::find($course_upload_rules['id']);
                        } else {
                            $rule = new CourseUploadRule();
                        }
                        $rule->description = @$course_upload_rules['description'];
                        $rule->updated_at = $now;
                        $rule->save();
                    }
                }
            }
        }

        CourseUploadRule::where('updated_at', '!=', $now)->get()->map(function ($q) {
            $q->delete();
        });

        $this->showToastrMessage('success', __('Updated Successful'));
        return redirect()->back();
    }

    public function courseEnroll()
    {
        $data['title'] = 'Course Enroll';
        $data['users'] = User::where('role','!=', 1)->get();
        $data['courses'] = Course::all();

        return view('admin.course.enroll-student', $data);
    }

    public function courseEnrollStore(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'course_id' => 'required',
        ]);

        if ($request->course_id) {
            $courseOrderExits = Order_item::whereCourseId($request->course_id)->whereUserId($request->user_id)->first();

            if ($courseOrderExits) {
                $order = Order::find($courseOrderExits->order_id);
                if ($order) {
                    if ($order->payment_status == 'due') {
                        Order_item::whereOrderId($courseOrderExits->order_id)->get()->map(function ($q) {
                            $q->delete();
                        });
                        $order->delete();
                    } else {
                        $this->showToastrMessage('error', __("Student has already purchased the course!"));
                        return redirect()->back();
                    }
                }
            }
        }

        $ownCourseCheck = Course::whereUserId($request->user_id)->where('id', $request->course_id)->first();

        if ($ownCourseCheck) {
            $this->showToastrMessage('error', __("He is a owner of the course. Can't purchase this course!"));
            return redirect()->back();
        }
        $course = Course::find($request->course_id);
        $order = new Order();
        $order->user_id = $request->user_id;
        $order->order_number = rand(100000, 999999);
        $order->payment_status = 'free';
        $order->created_by_type = 2;
        $order->save();

        $order_item = new Order_item();
        $order_item->order_id = $order->id;
        $order_item->user_id = $request->user_id;
        $order_item->course_id = $request->course_id;
        $order_item->owner_user_id = $course->user_id ?? null;
        $order_item->unit_price = 0;
        $order_item->admin_commission = 0;
        $order_item->owner_balance = 0;
        $order_item->sell_commission = 0;
        $order_item->save();

        /** ====== Send notification =========*/
        $text = __("New student enrolled");
        $target_url = route('instructor.all-student');
        foreach ($order->items as $item)
        {
            if ($item->course)
            {
                $this->send($text, 2, $target_url, $item->course->user_id);
            }
        }

        $text = __("Course has been sold");
        $this->send($text, 1, null, null);

        $text = __("New course enrolled by Admin");
        $target_url = route('student.my-learning');
        $this->send($text, 3, $target_url, $request->user_id);

        /** ====== Send notification =========*/

        $this->showToastrMessage('success', __('Student enroll in course'));
        return redirect()->back();
    }
}
