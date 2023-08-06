<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EditUserRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use App\Traits\General;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\type;
use DB;
use Auth;

class UserController extends Controller
{
    use General;

    public function index()
    {
        if (!auth::guard('admins')->user()->can('user_management')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'All Users';
        $data['users'] = User::whererole(1)->paginate(25);
        $data['navUserParentActiveClass'] = 'mm-active';
        $data['navUserParentShowClass'] = 'mm-show';
        $data['subNavUserActiveClass'] = 'mm-active';

        return view('admin.users.index', $data);
    }

    public function create()
    {
        if (!auth::guard('admins')->user()->can('user_management')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Add User';
        $data['navUserParentActiveClass'] = 'mm-active';
        $data['navUserParentShowClass'] = 'mm-show';
        $data['subNavUserCreateActiveClass'] = 'mm-active';
        $data['types'] = Role::all();
        return view('admin.users.create', $data);
    }


    public function store(UserRequest $request)
    {
        if (!auth::guard('admins')->user()->can('user_management')) {
            abort('403');
        } // end permission checking

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->user_name = $request->user_name;
        $user->password = Hash::make($request->password);
        $user->type = 1;
        $user->assigntype($request->type_name);
        $user->email_verified_at = Carbon::now()->format("Y-m-d H:i:s");
        $user->save();
        return $this->controlRedirection($request, 'user', 'User');

    }

    public function edit($id)
    {
//        dd($id);
//        if (!auth::guard('admins')->user()->can('user_management')) {
//            abort('403');
//        } // end permission checking

        $data['title'] = 'Edit User';
        $data['navUserParentActiveClass'] = 'mm-active';
        $data['navUserParentShowClass'] = 'mm-show';
        $data['subNavUserActiveClass'] = 'mm-active';
        $data['roles'] = Role::all();
        $data['user'] = User::find($id);
        return view('admin.users.edit', $data);
    }

    public function update(EditUserRequest $request, $id)
    {
        if (!auth::guard('admins')->user()->can('user_management')) {
            abort('403');
        } // end permission checking

        if (User::whereEmail($request->email)->where('id', '!=', $id)->count() > 0)
        {
            $this->showToastrMessage('warning', __('Email already exist'));
            return redirect()->back();
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->user_name = $request->user_name;
        if ($request->type_name)
        {
            DB::table('model_has_types')->where('type_id', $user->types->first()->id)->where('model_id', $id)->delete();
        }
        $user->assigntype($request->type_name);
        $user->save();
        return $this->controlRedirection($request, 'user', 'User');

    }

    public function delete($id)
    {
        if (!auth::guard('admins')->user()->can('user_management')) {
            abort('403');
        } // end permission checking

        User::whereId($id)->delete();

        $this->showToastrMessage('error', __('User has been deleted'));
        return redirect()->back();
    }

}
