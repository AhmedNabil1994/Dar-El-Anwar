<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\Level;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        $data['classes'] = ClassRoom::query()->whereStatus(1)
            ->whereHas('students',function ($q){
                $q->where('id',Auth::guard('students')->id());
            })->orderBy('id','DESC');

        $data['classes'] = $data['classes']->paginate(25);

        return view('admin.class_room.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        $data['levels'] = Level::whereStatus(1)->get();
        return view('admin.class_room.create',$data);
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
        ClassRoom::create([
            'name'=>$request->name,
            'status'=>$request->status?1:0,
        ]);
        return redirect()->route('class_room.index')->with('success','تم اضافة الفصل');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(ClassRoom $class)
    {
        //
        $data['levels'] = Level::whereStatus(1)->get();
        return view('admin.class_room.edit',compact('class'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ClassRoom $class)
    {
        //
        $class->update([
            'name'=>$request->name,
            'status'=>$request->status?1:0,
        ]);
        return redirect()->route('class_room.index')->with('success','تم تعديل الفصل');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(ClassRoom $class)
    {
        //
        $class->delete();
        return redirect()->route('class_room.index')->with('success','تمت ازالة الفصل');

    }
}
