<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Instructor;
use App\Models\Salary;
use App\Models\Upload;
use Illuminate\Http\Request;
use App\Tools\Repositories\Crud;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\EmployeeRequest;

class EmployeeController extends Controller
{
    protected $employeeRepo;

    public function __construct(Employee $employee)
    {
        $this->employeeRepo = new Crud($employee);
    }

    public function index(Request $request)
    {
        $employees = Employee::query();
        $query_search = $request->query_search;
        if($query_search)
            $employees->where('name','LIKE','%'.$query_search.'%');
        $employees = $employees->paginate(25);
        return view('admin.employees.list', compact('employees','query_search'));
    }

    public function active(Request $request)
    {
        $employees = Employee::query()->where('status',1);
        $query_search = $request->query_search;
        if($query_search)
            $employees->where('name','LIKE','%'.$query_search.'%');
        $employees = $employees->paginate(25);
        return view('admin.employees.list', compact('employees','query_search'));
    }

    public function archive(Request $request)
    {
        $employees = Employee::query()->where('status',2);
        $query_search = $request->query_search;
        if($query_search)
            $employees->where('name','LIKE','%'.$query_search.'%');
        $employees = $employees->paginate(25);
        return view('admin.employees.list', compact('employees','query_search'));
    }

    public function create()
    {
        $data['departments'] = Department::whereStatus(1)->get();
        return view('admin.employees.add', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->all();

        $validatedData['password'] = Hash::make($validatedData['password']);
        $employee = $this->employeeRepo->create($validatedData);

        if($request->hasFile('image')){
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
        if($validatedData['job_title'] == 'teacher')
            $instructor = Instructor::create([
                'email' => $employee->email,
                'password'=> $employee->password,
                'employee_id'=> $employee->id
            ]);
        else if($validatedData['job_title'] == 'driver')
            $employee->update(['type'=>'driver']);
        return redirect()->route('employees.index')->with('success', 'Employee created successfully');
    }

    public function edit($id)
    {
        $employee = $this->employeeRepo->find($id);

        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {


        $validatedData = $request->all();
        $validatedData['password'] = Hash::make($validatedData['password']);
        $employee = $this->employeeRepo->find($id);
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

        $employee = $this->employeeRepo->update($validatedData, $id);
        $instructor = $employee->instructor->where('email',$employee->email)->first();

        if($validatedData['job_title'] == 'teacher')
        {
            $instructor->email = $employee->email;
            $instructor->password = $employee->password;
            $instructor->employee_id = $employee->id;
            $instructor->save();
        }

        else if($validatedData['job_title'] == 'driver')
            $employee->update(['type'=>'driver']);
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }

    public function delete($id)
    {
        $employee = $this->employeeRepo->find($id);
        $employee->instructor->where('email',$employee->email)->first()->delete();
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }

    public function createSalary()
    {
        $employees = Employee::where('status',1)->get();

        return view('admin.employees.salaries.create', compact('employees'));
    }

    public function storeSalary(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'salary' => 'required|numeric',
            // Add more validation rules as needed
        ]);
        $salary = Salary::where('employee_id',$request->employee_id)->first();
        if(!$salary)
            Salary::create([
                'employee_id' => $request->input('employee_id'),
                'salary' => $request->input('salary'),
                'date' => now(), // You can adjust this based on your requirements
            ]);
        else
            $salary->update([
                'salary' => $request->input('salary'),
            ]);
        return redirect()->route('employees.index');

    }

    public function updatePassword(Request $request)
    {
        $rules = [
            'password' => 'required|string|min:6|max:255|confirmed',
            'password_confirmation' => 'required|string|min:6|max:255',        ];

        $messages = [
            'password.required' => __('The password field is required.'),
            'password.string' => __('The password field must be a string.'),
            'password.min' => __('The password must be at least 8 characters.'),
            'password.confirmed' => __('The password confirmation does not match.'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the password here

        return redirect()->back()->with('success', __('Password has been updated successfully.'));
    }


}
