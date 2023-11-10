<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DentistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TeethController;
use App\Http\Controllers\TypeController;
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

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/patients',PatientController::class);
Route::resource('/dentists',DentistController::class);
Route::resource('/staffs',StaffController::class);
Route::resource('/teeths',TeethController::class);
Route::resource('/services',ServiceController::class);
Route::resource('/procedures',ProcedureController::class);
Route::resource('/medicalRecords',MedicalRecordController::class);
Route::resource('/appointments',AppointmentController::class);
Route::resource('/types',TypeController::class);

