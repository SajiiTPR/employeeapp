<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function attendance()
    {
        $employees = Employee::all();
        $attendances = Attendance::with('employee')->get();
        return view('details.attendance', compact('employees', 'attendances'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'status' => 'required|in:present,absent,late,half_day',
            'check_in' => 'nullable|date_format:H:i',
            'check_out' => 'nullable|date_format:H:i',
            'work_hours' => 'nullable|numeric|min:0|max:24',
            'remarks' => 'nullable|string|max:255',
        ]);

        Attendance::create($request->all());

        return redirect()->route('attendance')->with('success', 'Attendance recorded successfully.');
    }
}
