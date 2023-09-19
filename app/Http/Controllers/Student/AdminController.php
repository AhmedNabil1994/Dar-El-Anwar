<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateAdminRequest;
use App\Http\Requests\EditAdminRequest;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{


    public function logout()
    {
        if(Auth::guard('admins')->check())
            Auth::guard('admins')->logout();
        else if(Auth::guard('students')->check())
            Auth::guard('students')->logout();
        else if(Auth::guard('parents')->check())
            Auth::guard('parents')->logout();
        else if(Auth::guard('instructors')->check())
            Auth::guard('instructors')->logout();
        return redirect('/login');
    }

    //generate login function
    public function login()
    {
        return view('admin.auth.login');
    }
    //generate loginAdmin
    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::guard('admins')->attempt($credentials)) {
            $user = Auth::guard('admins')->user();
            Auth::guard('admins')->login($user);

//             dd($user);
             //dd(Auth::guard('admins')->user());
//                dd(Auth::user());
            return redirect(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }





    ############
    public function index(Request $request)
    {


        $admins = Admin::query()->orderBy('id','DESC');

        if ($request->filled('search')) {
            $search = $request->search;
            $admins->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('username', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%")
                    ->orWhere('phone', 'LIKE', "%$search%");
            });
        }

        $admins = $admins->paginate(10);
//        dd($admins);
        return view('admin.admins.list', compact('admins'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.admins.create',compact('roles'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $admins = Admin::where('name', 'LIKE', "%$search%")
            ->orWhere('email', 'LIKE', "%$search%")
            ->orWhere('username', 'LIKE', "%$search%")
            ->orWhere('phone', 'LIKE', "%$search%")
            ->paginate(10);
        return view('admins.search', compact('admins'));
    }

    public function store(CreateAdminRequest $request)
    {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password);
        $admin->hidden = 1;
        $admin->save();

        $admin->roles()->attach(Role::findOrFail($request->role_id));
        if($request->role == 1)
            $admin->update(['private_user'=>1]);
        else
            $admin->update(['private_user'=>0]);
        return redirect()->route('admins.index')->with('success', 'Admin created successfully.');
    }

    public function edit(Request $request ,Admin $admin)
    {
        $roles = Role::all();
        return view('admin.admins.edit', compact('admin','roles'));
    }

        public function update(Request $request, $id)
    {

        $admin = Admin::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        $admin->phone = $request->phone;
        $admin->hidden = 1;

        if (!empty($request->input('password'))) {
            $admin->password = Hash::make($request->input('password'));
        }


        $admin->save();
        $admin->roles()->sync(Role::findOrFail($request->role));
        if($request->role == 1)
            $admin->update(['private_user'=>1]);
        else
            $admin->update(['private_user'=>0]);
        return redirect()->route('admins.index')->with('success', 'Admin updated successfully.');
    }

    public function delete(Request $request, Admin $admin)
    {
        $this->authorize('delete-admins');
        $admin = Admin::findOrFail($request->id);
        if ($admin) {
            $admin->delete();
            return response()->json(['status' => 'success', 'message' => __('Admin :name has been deleted successfully.', ['name' => $admin->name])]);
        } else {
            return response()->json(['status' => 'error', 'message' =>  __('Admin not found.')]);
        }
    }

    public function updatePassword(EditAdminRequest $request, $id, Admin $admin)
    {
        $admin = Admin::find($id);
        $admin->password = Hash::make($request->input('password'));
        $admin->save();
        return redirect()->route('admins.index')->with('success', 'Admin updated successfully.');
    }

}
