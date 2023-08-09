<?php

namespace App\Http\Controllers;

use App\Models\AttendanceLeave;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceLeaveController extends Controller
{
    //

    public function index()
    {
        $attendances_leaves = AttendanceLeave::all();
        return view('admin.employees.attendance_leave.list', compact('attendances_leaves'));
    }

    public function create()
    {

        $employees = Employee::where('status',1)->get();
        return view('admin.employees.attendance_leave.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'status' => 'required',
            // Add more validation rules as needed
        ]);

        // Store the attendance_leave record
        AttendanceLeave::create([
            'employee_id' => $request->input('employee_id'),
            'status' => $request->input('status'),
            'date' => $request->input('date'),
            'start_date'=> $request->input('start_date'),
            'end_date'=> $request->input('end_date'),
            'reason'=> $request->input('reason'),
        ]);

        // Redirect or return a response as needed
        return redirect()->route('attendance_leave.index');
    }
}
