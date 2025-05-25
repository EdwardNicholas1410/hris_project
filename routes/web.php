<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DeptController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// app routes

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// dept
Route::prefix('dept')->name('dept.')->middleware('auth')->group(function () {
    Route::get('/', [DeptController::class, 'index'])->name('index')->middleware('permission:dept.index');
    Route::get('/data', [DeptController::class, 'data'])->name('data')->middleware('permission:dept.data');
    Route::get('/create', [DeptController::class, 'create'])->name('create')->middleware('permission:dept.create');
    Route::post('/store', [DeptController::class, 'store'])->name('store')->middleware('permission:dept.store');
    Route::get('/{id}/edit', [DeptController::class, 'edit'])->name('edit')->middleware('permission:dept.edit');
    Route::put('/{id}/update', [DeptController::class, 'update'])->name('update')->middleware('permission:dept.update');
    Route::delete('/{id}/destroy', [DeptController::class, 'destroy'])->name('destroy')->middleware('permission:dept.destroy');
});

// employee
Route::prefix('employee')->name('employee.')->middleware('auth')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('index')->middleware('permission:employee.index');
    Route::get('/data', [EmployeeController::class, 'data'])->name('data')->middleware('permission:employee.data');
    Route::get('/create', [EmployeeController::class, 'create'])->name('create')->middleware('permission:employee.create');
    Route::post('/store', [EmployeeController::class, 'store'])->name('store')->middleware('permission:employee.store');
    Route::get('/{id}/edit', [EmployeeController::class, 'edit'])->name('edit')->middleware('permission:employee.edit');
    Route::put('/{id}/update', [EmployeeController::class, 'update'])->name('update')->middleware('permission:employee.update');
    Route::delete('/{id}/destroy', [EmployeeController::class, 'destroy'])->name('destroy')->middleware('permission:employee.destroy');
});

// user
Route::prefix('user')->name('user.')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index')->middleware('permission:user.index');
    Route::get('/data', [UserController::class, 'data'])->name('data')->middleware('permission:user.data');
    Route::get('/create', [UserController::class, 'create'])->name('create')->middleware('permission:user.create');
    Route::post('/store', [UserController::class, 'store'])->name('store')->middleware('permission:user.store');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit')->middleware('permission:user.edit');
    Route::put('/{id}/update', [UserController::class, 'update'])->name('update')->middleware('permission:user.update');
    Route::delete('/{id}/destroy', [UserController::class, 'destroy'])->name('destroy')->middleware('permission:user.destroy');
});

// attendance
Route::prefix('attendance')->name('attendance.')->middleware('auth')->group(function () {
    Route::get('/', [AttendanceController::class, 'index'])->name('index')->middleware('permission:attendance.index');
    Route::get('/data', [AttendanceController::class, 'data'])->name('data')->middleware('permission:attendance.data');
    Route::get('/create', [AttendanceController::class, 'create'])->name('create')->middleware('permission:attendance.create');
    Route::post('/store', [AttendanceController::class, 'store'])->name('store')->middleware('permission:attendance.store');
    Route::get('/{id}/edit', [AttendanceController::class, 'edit'])->name('edit')->middleware('permission:attendance.edit');
    Route::put('/{id}/update', [AttendanceController::class, 'update'])->name('update')->middleware('permission:attendance.update');
    Route::delete('/{id}/destroy', [AttendanceController::class, 'destroy'])->name('destroy')->middleware('permission:attendance.destroy');
    Route::post('/check-in', [AttendanceController::class, 'checkIn'])->name('check-in')->middleware('permission:attendance.check-in');
    Route::post('/check-out', [AttendanceController::class, 'checkOut'])->name('check-out')->middleware('permission:attendance.check-out');
});

// leave request
Route::prefix('leave_request')->name('leave_request.')->middleware('auth')->group(function () {
    Route::get('/', [LeaveRequestController::class, 'index'])->name('index')->middleware('permission:leave_request.index');
    Route::get('/data', [LeaveRequestController::class, 'data'])->name('data')->middleware('permission:leave_request.data');
    Route::get('/create', [LeaveRequestController::class, 'create'])->name('create')->middleware('permission:leave_request.create');
    Route::post('/store', [LeaveRequestController::class, 'store'])->name('store')->middleware('permission:leave_request.store');
    Route::get('/{id}/edit', [LeaveRequestController::class, 'edit'])->name('edit')->middleware('permission:leave_request.edit');
    Route::put('/{id}/update', [LeaveRequestController::class, 'update'])->name('update')->middleware('permission:leave_request.update');
    Route::put('/{id}/status', [LeaveRequestController::class, 'updateStatus'])->name('updateStatus')->middleware('permission:leave_request.status');
    Route::delete('/{id}/destroy', [LeaveRequestController::class, 'destroy'])->name('destroy')->middleware('permission:leave_request.destroy');
    Route::get('/{id}', [LeaveRequestController::class, 'show'])->name('show')->middleware('permission:leave_request.show');
});
