<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StudentEditRequest;
use App\Http\Requests\Student\StudentStoreRequest;
use App\Models\Branch;
use App\Models\City;
use App\Models\Governorate;
use App\Models\Instructor;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\ParentInfo;
use App\Models\Student;
use App\Models\Upload;
use App\Models\User;
use App\Tools\Repositories\Crud;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller
{


    use General, ImageSaveTrait;
    protected $studentModel;

    public function __construct( Student $student)
    {
        $this->studentModel = new Crud($student);
    }

    public function logout()
    {
        Auth::guard('students')->logout();
        return redirect('/login');
    }

    public function index()
    {
        $data['title'] = 'All Student';
        $students = $this->studentModel->getOrderById('DESC', 25);
        return view('admin.student.list', $data, compact('students'));
    }

    public function create()
    {

        $data['title'] = 'Add Student';
        $branches = Branch::all();
        $cities = City::all();
        return view('admin.student.add', compact(['cities','branches']));
    }

    public function store(StudentStoreRequest $request)
    {

        $data = $request->all();
        $student_data = [
            'user_id' => $user->id??null,
            'name' => $request->name, // updated from $request->first_name
            'code' =>  mt_rand(1000, 9999), // updated from $request->first_name
            'email' => $request->email, // updated from $request->first_name
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
            'derpatment' => $request->derpatment, // newly added
            'appointment' => $request->appointment, // newly added
            'classroom' => $request->classroom, // newly added
            'password' =>  Hash::make($request->password), // newly added
        ];

        $student = $this->studentModel->store($student_data);

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

        if ($request->hasFile('parents_card_copy')) {
            $upload = new Upload;
            $upload->file_original_name = null;
            $arr = explode('.', $request->file('parents_card_copy')->getClientOriginalName());

            for($i=0; $i < count($arr)-1; $i++){
                if($i == 0){
                    $upload->file_original_name .= $arr[$i];
                }
                else{
                    $upload->file_original_name .= ".".$arr[$i];
                }
            }

            $upload->file_name = $request->file('parents_card_copy')->store('uploads/all','public');

            $upload->user_id = $student->id;
            $upload->extension = $request->file('parents_card_copy')->getClientOriginalExtension();
            $upload->type = 'image';
            $upload->file_size = $request->file('parents_card_copy')->getSize();
            $upload->save();

            $student->update([
                'parents_card_copy' => $upload->id,
            ]);
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

        ParentInfo::create([
            'student_id' => $student->id,
            'name' => $request->guardian_name,
            'profession' => $request->profession,
            'relationship' => $request->guardian_relationship,
            'phone_number' => $request->guardian_phone_number, // newly added
            'whatsapp_number' => $request->guardian_whatsapp_number, // newly added
            'student_pickup_optional' => $request->receiving_officer == 'on'? 1:0, // newly added
            'follow_up_person' => $request->followup_officer == 'on'? 1:0, // newly added
            'email' => $request->guardian_email, // newly added
            'national_id' => $request->id_number, // newly added
            'parents_marital_status' => $request->parents_social_status, // newly added
        ]);


        return redirect()->route('student.index')->with('success', 'Student created successfully!');
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
        $user = User::find($data['student']->user_id??0);

        $cities = City::all();
        return view('admin.student.edit',
            compact('branches', 'student','user','cities','title','parent'));
    }


    public function update(StudentEditRequest $request, $id)
    {
        $student = $this->studentModel->getRecordByid($id);


        $student_data = [
            'user_id' => $user->id??null,
            'name' => $request->name, // updated from $request->first_name
            'code' => $request->code, // updated from $request->first_name
            'email' => $request->email, // updated from $request->first_name
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
            'derpatment' => $request->derpatment, // newly added
            'appointment' => $request->appointment, // newly added
            'classroom' => $request->classroom, // newly added

        ];

        if($request->password != null)
        {
            $student_data['password'] = Hash::make($request->password);

        }

        $this->studentModel->updateByid($student_data, $id);

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

        $student->parent->update([
            'student_id' => $student->id,
            'name' => $request->guardian_name,
            'profession' => $request->profession,
            'relationship' => $request->guardian_relationship,
            'phone_number' => $request->guardian_phone_number, // newly added
            'whatsapp_number' => $request->guardian_whatsapp_number, // newly added
            'student_pickup_optional' => $request->receiving_officer == 'on'? 1:0, // newly added
            'follow_up_person' => $request->followup_officer == 'on'? 1:0, // newly added
            'email' => $request->guardian_email, // newly added
            'national_id' => $request->id_number, // newly added
            'parents_marital_status' => $request->parents_social_status, // newly added
        ]);

        $this->showToastrMessage('success', __('Updated Successfully'));
        return redirect()->route('student.index');
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




}
