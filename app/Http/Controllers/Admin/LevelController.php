<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Level;
use App\Tools\Repositories\Crud;
use App\Traits\General;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class LevelController extends Controller
{
    use General;

    protected $model;
    public function __construct(BlogCategory $category)
    {
        $this->model = new Crud($category);
    }

    public function index()
    {


        $data['title'] = 'المستويات';
        $data['navLevelActiveClass'] = "mm-active";
        $data['subNavLevelIndexActiveClass'] = "mm-active";
        $data['levels'] = Level::query()->orderBy('id','DESC');
        $data['levels'] = $data['levels']->paginate(25);
        return view('admin.level.list', $data);
    }

    public function create()
    {
        return view('admin.level.create');
    }

    public function edit(Level $level)
    {
        return view('admin.level.edit',compact('level'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'status' => $request->status == 'on' ? 1 : 0,
        ];

        Level::create($data);
        return redirect()->route('level.index')->with('success', 'تم اضافة مستوي');
    }

    public function update(Request $request,Level $level)
    {
        if (!Auth::user()->can('manage_blog')) {
            abort('403');
        } // end permission checking

        $data = [
            'name' => $request->name,
            'status' => $request->status == 'on' ? 1:0,
        ];

        $level->update($data); // update category
        return redirect()->route('level.index')->with('success', __('تم تعديل المستوي'));
    }

    public function delete(Level $level)
    {
        if (!Auth::user()->can('manage_blog')) {
            abort('403');
        } // end permission checking

        $level->delete(); // delete record
        return redirect()->back();
    }
}
