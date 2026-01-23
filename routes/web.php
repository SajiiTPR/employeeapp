<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [EmployeeController::class, 'index']);
Route::get('details/{id}/details', [EmployeeController::class, 'details']);
Route::get('details/create', [EmployeeController::class, 'create']);
// Route::get('details/update', [EmployeeController::class, 'update']);
Route::get('details/{id}/update', [EmployeeController::class, 'update']);
Route::put('details/{id}/newupdate', [EmployeeController::class, 'newupdate']);

Route::get('details/{id}/delete', [EmployeeController::class, 'delete']);

Route::post('details/insert', [EmployeeController::class, 'insert']);
