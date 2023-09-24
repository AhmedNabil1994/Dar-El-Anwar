<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ParentInfoEditRequest;
use App\Http\Requests\Admin\ParentInfoStoreRequest;
use App\Models\Student;
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

    public function index()
    {
        $parentInfos = $this->parentInfoRepo->getOrderById('DESC', 25);
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

    public function update(ParentInfoEditRequest $request, $id)
    {
//       return response()->json($request->validated());
        $data = $request->validated();
        $this->parentInfoRepo->updateById($data, $id);
        return redirect()->route('parent_infos.index')->with('success', 'Parent info updated successfully');
    }

    public function destroy($id)
    {
        $this->parentInfoRepo->deleteById($id);
        return redirect()->route('parent_infos.index')->with('success', 'Parent info deleted successfully');
    }
}
