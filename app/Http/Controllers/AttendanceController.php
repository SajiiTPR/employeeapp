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

    public function getAttendance($id) {
        // Get all employees for the dropdown
        $employees = Employee::all();
        
        // Get the specific attendance record by ID (from the route parameter)
        $attendance = Attendance::with('employee')->find($id);
        
        // Check if attendance exists
        if (!$attendance) {
            return redirect()->route('attendance')->with('error', 'Attendance record not found');
        }
        
        return view('details.updateAttendance', compact('employees', 'attendance'));
    }

    public function deleteAttendance($id)
    {
        $val = Attendance::find($id);
        $dlt = $val->delete();

        return redirect()->route('attendance')->with('success', 'Delete attendance record successfully');
    }

    public function update(Request $request)
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

        // Get the attendance ID from the hidden input
        $attendanceId = $request->input('attendance_id');
        
        // Find the attendance record
        $attendance = Attendance::find($attendanceId);
        
        if (!$attendance) {
            return redirect()->route('attendance')->with('error', 'Attendance record not found');
        }

        // Update only the fillable fields (exclude attendance_id)
        $attendance->update($request->except(['attendance_id']));

        return redirect()->route('attendance')->with('success', 'Attendance updated successfully');
    }

    
}
