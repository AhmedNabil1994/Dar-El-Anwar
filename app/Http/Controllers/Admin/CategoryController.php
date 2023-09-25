<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Department;
use App\Models\Upload;
use App\Tools\Repositories\Crud;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class CategoryController extends Controller
{
    use  ImageSaveTrait, General;

    protected $model;
    public function __construct(Department $category)
    {
        $this->model = new Crud($category);
    }
    public function index(Request $request)
    {
        $data['title'] = 'Manage Category';
        $data['categories'] = Department::query()->orderBy('id','DESC');
        if($request->search_key)
            $data['categories']->where('name','like','%'.$request->search_key.'%');
        $data['categories'] = $data['categories']->paginate(25);
        return view('admin.category.index', $data);
    }

    public function create()
    {

        $data['title'] = 'Add Category';
        return view('admin.category.create', $data);
    }

    public function store(Request $request)
    {

        $data = [
            'name' => $request->name,
            'is_feature' => $request->is_feature ? 'yes' : 'no',
        ];

        $depart = $this->model->create($data); // create new category


        return $this->controlRedirection($request, 'category', 'Category');
    }

    public function edit($uuid)
    {

        $data['title'] = 'Edit Category';
        $data['category'] = $this->model->getRecordByUuid($uuid);
        return view('admin.category.edit', $data);
    }

    public function update(CategoryRequest $request, $uuid)
    {

        $category = $this->model->getRecordByUuid($uuid);


        $data = [
            'name' => $request->name,
            'is_feature' => $request->is_feature ? 'yes' : 'no',
            'slug' => getSlug($request->name),
        ];

        $this->model->updateByUuid($data, $uuid); // update category

        return $this->controlRedirection($request, 'category', 'Category');
    }

    public function delete($uuid)
    {
        $category = $this->model->getRecordByUuid($uuid);
        $this->deleteFile($category->image); // delete file from server
        $this->model->deleteByUuid($uuid); // delete record

       return redirect()->back();
    }
}
