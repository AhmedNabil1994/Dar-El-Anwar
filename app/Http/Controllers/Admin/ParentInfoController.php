<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ParentInfoEditRequest;
use App\Http\Requests\Admin\ParentInfoStoreRequest;
use App\Models\Student;
use App\Models\Upload;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;

use App\Models\ParentInfo;
use App\Tools\Repositories\Crud;
use Illuminate\Support\Facades\Auth;

class ParentInfoController extends Controller
{
    use General, ImageSaveTrait;


    protected $parentInfoRepo;

    public function logout()
    {
        Auth::guard('parents')->logout();
        return redirect('/login');
    }


    public function __construct(ParentInfo $parentInfo)
    {
        $this->parentInfoRepo = new Crud($parentInfo);

    }

    public function index(Request $request)
    {
        $parentInfos = ParentInfo::query()
            ->orderBy('id','DESC');

        if($request->search_key)
            $parentInfos->where('name',$request->search_key);

        $parentInfos = $parentInfos->paginate(25);
        return view('admin.parentInfos.list', compact('parentInfos'));
    }

    public function add()
    {
        return view('admin.parentInfos.add');
    }

    public function store(ParentInfoStoreRequest $request)
    {
        $data = $request->validated();
        $this->parentInfoRepo->store($data);
        return redirect()->route('parent_Infos.index')->with('success', 'Parent info created successfully');
    }

    public function show($id)
    {
        $parentInfo = $this->parentInfoRepo->getRecordById($id);
        return view('admin.parentInfos.show', compact('parentInfo'));
    }

    public function edit($id)
    {
        $parentInfo = $this->parentInfoRepo->getRecordById($id);
        $student = $parentInfo->student;
        $students = Student::all();
        $oldInput = session()->getOldInput();
        return view('admin.parentInfos.edit', compact('parentInfo', 'oldInput', 'students'));
    }

    public function update(Request $request,ParentInfo $parent)
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


        return redirect()->route('parent_infos.index')->with('success', 'Parent info updated successfully');
    }

    public function destroy($id)
    {
        $this->parentInfoRepo->deleteById($id);
        return redirect()->route('parent_infos.index')->with('success', 'تم تحديث بيانات الاباء');
    }
}
