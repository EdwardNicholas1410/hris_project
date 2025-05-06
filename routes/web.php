<?php

use App\Http\Controllers\DeptController;
use App\Http\Controllers\EmployeeController;
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
Route::prefix('dept')->name('dept.')->group(function () {
    Route::get('/', [DeptController::class, 'index'])->name('index');
    Route::get('/data', [DeptController::class, 'data'])->name('data');
    Route::get('/create', [DeptController::class, 'create'])->name('create');
    Route::post('/store', [DeptController::class, 'store'])->name('store');
    Route::get('/edit', [DeptController::class, 'edit'])->name('edit');
    Route::put('/update', [DeptController::class, 'update'])->name('update');
    Route::delete('/destroy', [DeptController::class, 'destroy'])->name('destroy');
});

// employee
Route::prefix('employee')->name('employee.')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('index');
    Route::get('/data', [EmployeeController::class, 'data'])->name('data');
});


