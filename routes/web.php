<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

// Employee Controller
// index web page route
Route::get('/', [EmployeeController::class, 'index']);

// view datas route
Route::get('details/{id}/details', [EmployeeController::class, 'details']);

// Insert data route
Route::get('details/create', [EmployeeController::class, 'create']);

// update data routes
Route::get('details/{id}/update', [EmployeeController::class, 'update']);
Route::post('details/{id}/newupdate', [EmployeeController::class, 'newupdate']);

// Delete Route
Route::get('details/{id}/delete', [EmployeeController::class, 'delete']);

// Insert Route
Route::post('details/insert', [EmployeeController::class, 'insert']);

// Attendance Controller
// attendance route
Route::get('details/attendance', [AttendanceController::class, 'attendance'])->name('attendance');
Route::post('attendances/store', [AttendanceController::class, 'store'])->name('attendances.store');

// show data Attendance
Route::get('details/{id}/attendance', [AttendanceController::class, 'getAttendance'])->name('getAttendance');

// delete attendance record
Route::get('details/{id}/deleteAttendance', [AttendanceController::class, 'deleteAttendance'])->name('deleteAttendance');

// update data Attendance
// Route::get('details/{id}/updateAttendance', [AttendanceController::class, 'updateAttendance']);

// update attendance record
Route::post('attendances/update', [AttendanceController::class, 'update'])->name('attendances.update');
