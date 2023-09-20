<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateAdminRequest;
use App\Http\Requests\EditAdminRequest;
use App\Models\City;
use App\Models\ClassRoom;
use App\Models\Course;
use App\Models\Department;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\Level;
use App\Models\Upload;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;

class InstructorController extends Controller
{


    public function logout()
    {
        if(Auth::guard('instructors')->check())
            Auth::guard('instructors')->logout();

        return redirect('/login');
    }

    public function profile(Request $request)
    {
        $data['user'] = Auth::guard('instructors')->user();
        $data['parent'] = $data['user']->parent;
        $branches = Branch::all();
        $data['depts'] = Department::where('status',1)->get();
        $data['class_rooms'] = ClassRoom::where('status',1)->get();
        $data['levels'] = Level::where('status',1)->get();
        $branches = Branch::all();
        $data['appointments'] = Course::whereStatus(1)->get();
        $cities = City::all();
        return view('instructor.profile',$data,
            compact('branches', 'cities',));
    }

    public function instructor_update(Request $request, Employee $employee)
    {


        $validatedData = $request->except('password');
        if($request->hasFile('image'))
        {
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

            $upload->user_id = $employee->id;
            $upload->extension = $request->file('image')->getClientOriginalExtension();
            $upload->type = 'image';
            $upload->file_size = $request->file('image')->getSize();
            $upload->save();

            $employee->update([
                'image' => $upload->id,
            ]);
        }
        else
        {
            $request['image'] = $employee->image;
        }

        if($request->password)
        {
            $password = Hash::make($request->password);
            $employee->update(['password' => $password]);
            $employee->instructor->update([
                'password' => $password,
            ]);
        }
        $employee = $employee->update($validatedData);
        return redirect()->back()->with('success', 'تم تعديل بياناتك');
    }


}
