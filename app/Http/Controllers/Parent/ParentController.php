<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StudentEditRequest;
use App\Http\Requests\Student\StudentStoreRequest;
use App\Models\Branch;
use App\Models\City;
use App\Models\ClassRoom;
use App\Models\Course;
use App\Models\Department;
use App\Models\Governorate;
use App\Models\Instructor;
use App\Models\Level;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\ParentInfo;
use App\Models\Student;
use App\Models\StudentNotification;
use App\Models\Upload;
use App\Models\User;
use App\Tools\Repositories\Crud;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ParentController extends Controller
{


    use General, ImageSaveTrait;
    protected $studentModel;

    public function __construct( Student $student)
    {
        $this->studentModel = new Crud($student);
    }


    public function logout()
    {
        if(Auth::guard('parents')->check())
            Auth::guard('parents')->logout();
        return redirect('/login');
    }

    public function index(Request $request)
    {
        $data['title'] = 'All Student';
        $students = Student::query()->orderBy('id','DESC');
        if($request->filterByBranch)
            $students->where('branch_id',$request->filterByBranch);
        if($request->filterByLevel)
            $students->where('level',$request->filterByLevel);
        if($request->filterByClass)
            $students->where('classroom',$request->filterByClass);
        if($request->filterByPeriod)
            $students->where('period',$request->filterByPeriod);
        if($request->filterByGender)
            $students->where('gender',$request->filterByGender);
        if($request->filterByJoining)
            $students->where('status',$request->filterByJoining);

        $data['branches'] = Branch::whereStatus(1)->get();
        $data['class_rooms'] = ClassRoom::all();
        $data['count'] = Student::count();
        $data['levels'] = Level::all();

        $students = $students->paginate(50);
        return view('admin.student.list', $data, compact('students'));
    }

    public function getClasses($id){

        $data['class_rooms'] = ClassRoom::where('status',1)
            ->where('level_id',$id)->get();
        return $data['class_rooms'];
    }

    public function create()
    {

        $data['title'] = 'Add Student';
        $data['depts'] = Department::where('status',1)->get();
        $data['class_rooms'] = ClassRoom::where('status',1)->get();
        $data['levels'] = Level::where('status',1)->get();
        $branches = Branch::all();
        $data['appointments'] = Course::whereStatus(1)->get();
        $cities = City::all();
        return view('admin.student.add', $data,compact(['cities','branches']));
    }

    public function view($id)
    {
        $data['student'] = $this->studentModel->getFirstBy('id', $id);
        $data['title'] = $data['student']->name . ' Details';

        $allUserOrder = Order::where('user_id', $data['student']->user_id);
        $paidOrderIds = $allUserOrder->where('payment_status', 'paid')->pluck('id')->toArray();

        $allUserOrder = Order::where('user_id', $data['student']->user_id);
        $freeOrderIds = $allUserOrder->where('payment_status', 'free')->pluck('id')->toArray();

        $orderIds = array_merge($paidOrderIds, $freeOrderIds);

        $data['orderItems'] = Order_item::whereIn('order_id', $orderIds)->latest()->paginate(15);

        return view('admin.student.view', $data);
    }

    public function edit($id)
    {


        $student= $this->studentModel->getFirstBy('id', $id);
        $parent = $student->parent;
        $title  = 'Edit ' . $student->first()->name;
        $branches= Branch::all();
        $data['depts'] = Department::where('status',1)->get();
        $user = User::find($data['student']->user_id??0);
        $data['class_rooms'] = ClassRoom::where('status',1)->get();
        $data['levels'] = Level::where('status',1)->get();
        $branches = Branch::all();
        $data['appointments'] = Course::whereStatus(1)->get();
        $cities = City::all();
        return view('admin.student.edit', $data,
            compact('branches', 'student','user','cities','title','parent'));
    }

    public function update(Request $request, $id)
    {
        $guardianRelationships = $request->guardian_relationship;
        if($guardianRelationships){

            $uniqueValues = array_unique($request->guardian_relationship);

            if(count($guardianRelationships) !== count($uniqueValues))
                return redirect()->back()->with('error','خانة الصلة مكررة');
        }
        $photos = [];


        $guardianRelationships = $request->guardian_relationship;

        if($guardianRelationships){

            $uniqueValues = array_unique($request->guardian_relationship);

            if(count($guardianRelationships) !== count($uniqueValues))
                return redirect()->back()->with('error','خانة الصلة مكررة');
        }
        $code = $this->create_code($request);

        $student_data = [
            'user_id' => $user->id??null,
            'name' => $request->name, // updated from $request->first_name
            'email' => $request->email, // updated from $request->first_name
            'code' => $code, // updated from $request->first_name
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'about_me' => $request->about_me,
            'birthdate' => $request->birthdate,
            'status' => $request->status,
            'city_id' => $request->city_id, // newly added
            'branch_id' => $request->branch_id, // newly added
            'period' => $request->period, // newly added
            'bus' => $request->bus, // newly added
            'blood_type' => $request->blood_type, // newly added
            'how_did_you_hear_about_us' => $request->how_did_you_hear_about_us, // newly added
            'joining_date' => $request->joining_date, // newly added
            'medical_history' => $request->medical_history, // newly added
            'class_room_id' => $request->classroom, // newly added
            'password' =>  Hash::make($request->password), // newly added
            'parents_marital_status' => $request->parents_social_status, // newly added
            'notes' => $request->notes, // newly added
        ];

        $student = Student::find($id);

        $student->update($student_data);
        if($request->password != null)
        {
            $password = Hash::make($request->password);
            $student->update(['password'=>$password]);
        }

        $student->dept()->sync($request->department);

        $student->courses()->sync($request->appointment);

        $student->level()->sync($request->level_id);

        if ($request->hasFile('image')) {
            $upload = new Upload;
            $upload->file_original_name = null;
            $arr = explode('.', $request->file('image')->getClientOriginalName());

            for($i=0; $i < count($arr)-1; $i++){
                if($i == 0){
                    $upload->file_original_name .= $arr[$i];
                }
                else{
                    $upload->file_original_name .= ".".$arr[$i];
                }
            }

            $upload->file_name = $request->file('image')->store('uploads/all','public');

            $upload->user_id = $student->id;
            $upload->extension = $request->file('image')->getClientOriginalExtension();
            $upload->type = 'image';
            $upload->file_size = $request->file('image')->getSize();
            $upload->save();

            $student->update([
                'image' => $upload->id,
            ]);
        }

       if ($request->parents_card_copy) {
            foreach ($request->parents_card_copy as $parents_card_copy)
            {
                $upload = new Upload;
                $upload->file_original_name = null;
                $arr = explode('.', $parents_card_copy->getClientOriginalName());


                for($i=0; $i < count($arr)-1; $i++){
                    if($i == 0){
                        $upload->file_original_name .= $arr[$i];
                    }
                    else{
                        $upload->file_original_name .= ".".$arr[$i];
                    }
                }
                $upload->file_name = $parents_card_copy->store('uploads/all','public');

                $upload->user_id = $student->id;
                $upload->extension = $parents_card_copy->getClientOriginalExtension();
                $upload->type = 'image';
                $upload->file_size = $parents_card_copy->getSize();
                $upload->save();

                array_push($photos,$upload->id);

                $student->update([
                    'parents_card_copy' => $photos,
                ]);
            }

        }

        if ($request->hasFile('birth_certificate')) {
            $upload = new Upload;
            $upload->file_original_name = null;
            $arr = explode('.', $request->file('birth_certificate')->getClientOriginalName());

            for($i=0; $i < count($arr)-1; $i++){
                if($i == 0){
                    $upload->file_original_name .= $arr[$i];
                }
                else{
                    $upload->file_original_name .= ".".$arr[$i];
                }
            }

            $upload->file_name = $request->file('birth_certificate')->store('uploads/all','public');

            $upload->user_id = $student->id;
            $upload->extension = $request->file('birth_certificate')->getClientOriginalExtension();
            $upload->type = 'image';
            $upload->file_size = $request->file('birth_certificate')->getSize();
            $upload->save();

            $student->update([
                'birth_certificate' => $upload->id,
            ]);
        }

        if ($request->hasFile('another_file')) {
            $upload = new Upload;
            $upload->file_original_name = null;
            $arr = explode('.', $request->file('another_file')->getClientOriginalName());

            for($i=0; $i < count($arr)-1; $i++){
                if($i == 0){
                    $upload->file_original_name .= $arr[$i];
                }
                else{
                    $upload->file_original_name .= ".".$arr[$i];
                }
            }

            $upload->file_name = $request->file('another_file')->store('uploads/all','public');

            $upload->user_id = $student->id;
            $upload->extension = $request->file('another_file')->getClientOriginalExtension();
            $upload->type = 'image';
            $upload->file_size = $request->file('another_file')->getSize();
            $upload->save();

            $student->update([
                'another_file' => $upload->id,
            ]);
        }

        foreach ($student->parent as $key => $parent){
            $parent->update([
                'student_id' => $student->id,
                'name' => $request->guardian_name[$key],
                'profession' => $request->profession[$key],
                'relationship' => $request->guardian_relationship[$key],
                'phone_number' => $request->guardian_phone_number[$key], // newly added
                'whatsapp_number' => $request->guardian_whatsapp_number[$key], // newly added
                'student_pickup_optional' => @$request->receiving_officer[$key] == 'on'? 1:0, // newly added
                'follow_up_person' => @$request->followup_officer[$key] == 'on'? 1:0, // newly added
                'email' => $request->guardian_email[$key], // newly added
                'national_id' => $request->id_number[$key], // newly added
            ]);
        }

        return redirect()->route('student.index')
            ->with('success', __('تم تحديث بيانات الطالب'));
    }


    public function parent_update(Request $request,ParentInfo $parent)

    {
        $photos = [];
//       return response()->json($request->validated());
        if ($request->parents_card_copy) {
            foreach ($request->parents_card_copy as $parents_card_copy)
            {
                $upload = new Upload;
                $upload->file_original_name = null;
                $arr = explode('.', $parents_card_copy->getClientOriginalName());


                for($i=0; $i < count($arr)-1; $i++){
                    if($i == 0){
                        $upload->file_original_name .= $arr[$i];
                    }
                    else{
                        $upload->file_original_name .= ".".$arr[$i];
                    }
                }
                $upload->file_name = $parents_card_copy->store('uploads/all','public');

                $upload->user_id = $parent->student->id;
                $upload->extension = $parents_card_copy->getClientOriginalExtension();
                $upload->type = 'image';
                $upload->file_size = $parents_card_copy->getSize();
                $upload->save();

                array_push($photos,$upload->id);

                $parent->student->update([
                    'parents_card_copy' => $photos,
                ]);
            }

        }

        if ($request->hasFile('birth_certificate')) {
            $upload = new Upload;
            $upload->file_original_name = null;
            $arr = explode('.', $request->file('birth_certificate')->getClientOriginalName());

            for($i=0; $i < count($arr)-1; $i++){
                if($i == 0){
                    $upload->file_original_name .= $arr[$i];
                }
                else{
                    $upload->file_original_name .= ".".$arr[$i];
                }
            }

            $upload->file_name = $request->file('birth_certificate')->store('uploads/all','public');

            $upload->user_id = $parent->student->id;
            $upload->extension = $request->file('birth_certificate')->getClientOriginalExtension();
            $upload->type = 'image';
            $upload->file_size = $request->file('birth_certificate')->getSize();
            $upload->save();

            $parent->student->update([
                'birth_certificate' => $upload->id,
            ]);
        }

        if ($request->hasFile('another_file')) {
            $upload = new Upload;
            $upload->file_original_name = null;
            $arr = explode('.', $request->file('another_file')->getClientOriginalName());

            for($i=0; $i < count($arr)-1; $i++){
                if($i == 0){
                    $upload->file_original_name .= $arr[$i];
                }
                else{
                    $upload->file_original_name .= ".".$arr[$i];
                }
            }

            $upload->file_name = $request->file('another_file')->store('uploads/all','public');

            $upload->user_id = $parent->student->id;
            $upload->extension = $request->file('another_file')->getClientOriginalExtension();
            $upload->type = 'image';
            $upload->file_size = $request->file('another_file')->getSize();
            $upload->save();

            $parent->student->update([
                'another_file' => $upload->id,
            ]);
        }


        $parent->update([
            'name' => $request->name,
            'profession' => $request->profession,
            'relationship' => $request->guardian_relationship,
            'phone_number' => $request->phone_number, // newly added
            'whatsapp_number' => $request->whatsapp_number, // newly added
            'student_pickup_optional' => @$request->receiving_officer == 'on'? 1:0, // newly added
            'follow_up_person' => @$request->follow_up_person == 'on'? 1:0, // newly added
            'email' => $request->email, // newly added
            'national_id' => $request->national_id, // newly added

        ]);
        if($request->password){
            $parent->update([
                    'password' => \Hash::make($request->password), // newly added
            ]);
        }

        $parent->student->update([
            'parents_marital_status' => $request->parents_marital_status,
        ]);


        return redirect()->route('parent_infos.index')->with('success', 'تم تحديث بياناتك');
    }

    public function store(Request $request)
    {



        $photos = [];
        $guardianRelationships = $request->guardian_relationship;

        if($guardianRelationships){

            $uniqueValues = array_unique($request->guardian_relationship);

            if(count($guardianRelationships) !== count($uniqueValues))
                return redirect()->back()->with('error','خانة الصلة مكررة');
        }
        $code = $this->create_code($request);

        $student_data = [
            'user_id' => $user->id??null,
            'name' => $request->name, // updated from $request->first_name
            'email' => $request->email, // updated from $request->first_name
            'code' => $code, // updated from $request->first_name
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'about_me' => $request->about_me,
            'birthdate' => $request->birthdate,
            'status' => $request->status,
            'city_id' => $request->city_id, // newly added
            'branch_id' => $request->branch_id, // newly added
            'period' => $request->period, // newly added
            'bus' => $request->bus, // newly added
            'blood_type' => $request->blood_type, // newly added
            'how_did_you_hear_about_us' => $request->how_did_you_hear_about_us, // newly added
            'joining_date' => $request->joining_date, // newly added
            'medical_history' => $request->medical_history, // newly added
            'class_room_id' => $request->classroom, // newly added
            'password' =>  Hash::make($request->password), // newly added
            'parents_marital_status' => $request->parents_social_status, // newly added
            'notes' => $request->notes, // newly added
        ];

        $student = Student::create($student_data);

        $student->dept()->sync($request->department);

        $student->courses()->sync($request->appointment);

        $student->level()->sync($request->level_id);

        if ($request->hasFile('image')) {
            $upload = new Upload;
            $upload->file_original_name = null;
            $arr = explode('.', $request->file('image')->getClientOriginalName());

            for($i=0; $i < count($arr)-1; $i++){
                if($i == 0){
                    $upload->file_original_name .= $arr[$i];
                }
                else{
                    $upload->file_original_name .= ".".$arr[$i];
                }
            }

            $upload->file_name = $request->file('image')->store('uploads/all','public');

            $upload->user_id = $student->id;
            $upload->extension = $request->file('image')->getClientOriginalExtension();
            $upload->type = 'image';
            $upload->file_size = $request->file('image')->getSize();
            $upload->save();

            $student->update([
                'image' => $upload->id,
            ]);
        }

        if ($request->parents_card_copy) {
            foreach ($request->parents_card_copy as $parents_card_copy)
            {
                $upload = new Upload;
                $upload->file_original_name = null;
                $arr = explode('.', $parents_card_copy->getClientOriginalName());


                for($i=0; $i < count($arr)-1; $i++){
                    if($i == 0){
                        $upload->file_original_name .= $arr[$i];
                    }
                    else{
                        $upload->file_original_name .= ".".$arr[$i];
                    }
                }
                $upload->file_name = $parents_card_copy->store('uploads/all','public');

                $upload->user_id = $student->id;
                $upload->extension = $parents_card_copy->getClientOriginalExtension();
                $upload->type = 'image';
                $upload->file_size = $parents_card_copy->getSize();
                $upload->save();

                array_push($photos,$upload->id);

                $student->update([
                    'parents_card_copy' => $photos,
                ]);
            }

        }
        if ($request->hasFile('birth_certificate')) {
            $upload = new Upload;
            $upload->file_original_name = null;
            $arr = explode('.', $request->file('birth_certificate')->getClientOriginalName());

            for($i=0; $i < count($arr)-1; $i++){
                if($i == 0){
                    $upload->file_original_name .= $arr[$i];
                }
                else{
                    $upload->file_original_name .= ".".$arr[$i];
                }
            }

            $upload->file_name = $request->file('birth_certificate')->store('uploads/all','public');

            $upload->user_id = $student->id;
            $upload->extension = $request->file('birth_certificate')->getClientOriginalExtension();
            $upload->type = 'image';
            $upload->file_size = $request->file('birth_certificate')->getSize();
            $upload->save();

            $student->update([
                'birth_certificate' => $upload->id,
            ]);
        }

        if ($request->hasFile('another_file')) {
            $upload = new Upload;
            $upload->file_original_name = null;
            $arr = explode('.', $request->file('another_file')->getClientOriginalName());

            for($i=0; $i < count($arr)-1; $i++){
                if($i == 0){
                    $upload->file_original_name .= $arr[$i];
                }
                else{
                    $upload->file_original_name .= ".".$arr[$i];
                }
            }

            $upload->file_name = $request->file('another_file')->store('uploads/all','public');

            $upload->user_id = $student->id;
            $upload->extension = $request->file('another_file')->getClientOriginalExtension();
            $upload->type = 'image';
            $upload->file_size = $request->file('another_file')->getSize();
            $upload->save();

            $student->update([
                'another_file' => $upload->id,
            ]);
        }
        if($guardianRelationships)
        {
            foreach($request->guardian_relationship as $key => $guardian)
            {
                ParentInfo::create([
                    'student_id' => $student->id,
                    'name' => $request->guardian_name[$key],
                    'profession' => $request->profession[$key],
                    'relationship' => $request->guardian_relationship[$key],
                    'phone_number' => $request->guardian_phone_number[$key], // newly added
                    'whatsapp_number' => $request->guardian_whatsapp_number[$key], // newly added
                    'student_pickup_optional' => @$request->receiving_officer[$key] == 'on'? 1:0, // newly added
                    'follow_up_person' => @$request->followup_officer[$key] == 'on'? 1:0, // newly added
                    'email' => $request->guardian_email[$key], // newly added
                    'national_id' => $request->id_number[$key], // newly added

                ]);
            }

        }
        StudentNotification::create([
            'user_id' => $student->id,
            'text' => get_setting('welcome_text'),
            'sender_id' => 1,
        ]);


        return redirect()->route('student.index')
            ->with('success', 'تم اضافة بيانات الطالب');
    }

    public function delete($id)
    {
        $student = $this->studentModel->getRecordByid($id);
        $this->studentModel->deleteByid($id);

        $this->showToastrMessage('success', __('Deleted Successfully'));
        return redirect()->back();
    }

    public function changeStudentStatus(Request $request)
    {
        $student = $this->studentModel->getRecordByid($request->id);
        $student->status = $request->status;
        $student->save();

        return response()->json([
            'data' => 'success',
        ]);
    }

    protected function create_code($request)
    {

        $year = Carbon::now()->year;
        $branch = $request->branch_id;

        $lastSequential = Student::orderBy('id','DESC')->first()->id;

        $sequential = $lastSequential + 1;

        $sequentialCode = sprintf("%04d", $sequential);

        return $year . $branch . $sequentialCode;
    }

    public function change_status(Request $request, $id)
    {
        $student = Student::find($id);
        if($student->status == 2)
            $student->update(['status' => 1]);
        else
            $student->update(['status' => $request->status]);

        return 'success';
    }

    public function profile(Request $request)
    {
        $data['user'] = Auth::guard('parents')->user();
        $data['parent'] = $data['user']->parent;
        $branches = Branch::all();
        $data['depts'] = Department::where('status',1)->get();
        $data['class_rooms'] = ClassRoom::where('status',1)->get();
        $data['levels'] = Level::where('status',1)->get();
        $branches = Branch::all();
        $data['appointments'] = Course::whereStatus(1)->get();
        $cities = City::all();
        return view('parent.profile',$data,
            compact('branches', 'cities',));
    }

    public function wallet(Request $request)
    {
        $user = Auth::guard('students')->user();
        $wallet = $user->wallet;
        $amount = $request->amount;
        if($request->act == 'on')
        {
            if($wallet < $amount)
                return redirect()->back()->with('error','هذا المبلغ اكبر من الموجود في المحفظة');
            $user->update(['wallet'=> $amount - $wallet]);
        }
        else
        {
            $user->update(['wallet'=> $amount + $wallet]);

            return redirect()->back()->with('success','تمت اضافة المبلغ');
        }

    }

}
