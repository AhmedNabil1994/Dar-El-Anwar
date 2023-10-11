<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
class BranchController extends Controller
{
    //
    public function index(Request $request)
    {
        $data['branches'] = Branch::all();
        return view('admin.branches.list',$data);
    }

    public function create(Request $request)
    {
        return view('admin.branches.create');
    }

    public function edit(Request $request,Branch $branch)
    {
        return view('admin.branches.edit',compact('branch'));
    }

    public function store(Request $request)
    {
        Branch::create([
            'name' => $request->branch_name
        ]);
        return redirect()->route('branches.index');
    }

    public function update(Request $request,Branch $branch)
    {
        $branch->update([
            'name' => $request->branch_name
        ]);
        return redirect()->route('branches.index');
    }

    public function delete(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branches.index');
    }


}
