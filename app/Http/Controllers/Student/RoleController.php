<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use App\Traits\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;
use Auth;

class RoleController extends Controller
{
    use General;

    public function index()
    {
        $data['title'] = 'Manage Roles';
        $data['roles'] = Role::paginate(25);
        $data['navUserParentActiveClass'] = 'mm-active';
        $data['navUserParentShowClass'] = 'mm-show';
        $data['subNavUserRoleActiveClass'] = 'mm-active';
        return view('admin.user.role.index', $data);
    }

    public function create()
    {
        $data['title'] = 'اضافة مجموعة';
        $data['roles'] = Role::all();
        $data['permissions'] = Permission::all();
        $data['navUserParentActiveClass'] = 'mm-active';
        $data['navUserParentShowClass'] = 'mm-show';
        $data['subNavUserRoleActiveClass'] = 'mm-active';
        $data['roles'] = Role::whereNull('role_parent_id')->get();
        return view('admin.user.role.create', $data);
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create([
            'role_parent_id' => $request->role_id,
            'name' => $request->name,
            'guard_name' => 'admins'
        ]);
        $role->givePermissionTo($request->permissions);
        return $this->controlRedirection($request, 'role', 'Role');
    }

    public function edit($id)
    {
        if (!auth::guard('admins')->user()->can('user_management')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'تعديل مجموعة';
        $data['role'] = Role::find($id);
        $data['permissions'] = Permission::all();
        $data['selected_permissions'] = DB::table('role_has_permissions')->where('role_id', $id)->select('permission_id')->pluck('permission_id')->toArray();
        $data['navUserParentActiveClass'] = 'mm-active';
        $data['navUserParentShowClass'] = 'mm-show';
        $data['subNavUserRoleActiveClass'] = 'mm-active';
        $data['roles'] = Role::whereNull('role_parent_id')->get();
        return view('admin.user.role.edit', $data);

    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'permissions' => ['required', 'array', 'min:1'],
        ]);

        $role = Role::find($id);
        $role->role_parent_id = $request->role_id;
        $role->name = $request->name;
        $role->save();

        DB::table('role_has_permissions')->where('role_id', $id)->delete();
        $role->givePermissionTo($request->permissions);
        Artisan::call('cache:clear');

        return $this->controlRedirection($request, 'role', 'Role');
    }

    public function delete($id)
    {
        if (!auth::guard('admins')->user()->can('user_management')) {
            abort('403');
        } // end permission checking

        $role = Role::find($id);
        DB::table('role_has_permissions')->where('role_id', $id)->delete();
        $role->delete();

        $this->showToastrMessage('error', __('Role has been deleted'));
        return redirect()->back();
    }


}
