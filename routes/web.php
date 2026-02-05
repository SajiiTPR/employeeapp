<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

// index web page route
Route::get('/', [EmployeeController::class, 'index']);

// view datas route
Route::get('details/{id}/details', [EmployeeController::class, 'details']);

// Insert data route
Route::get('details/create', [EmployeeController::class, 'create']);

// update data routes
Route::get('details/{id}/update', [EmployeeController::class, 'update']);
Route::put('details/{id}/newupdate', [EmployeeController::class, 'newupdate']);

// Delete Route
Route::get('details/{id}/delete', [EmployeeController::class, 'delete']);

// Insert Route
Route::post('details/insert', [EmployeeController::class, 'insert']);

// attendance route
Route::get('details/attendance', [AttendanceController::class, 'attendance'])->name('attendance');
Route::post('attendances/store', [AttendanceController::class, 'store'])->name('attendances.store');
