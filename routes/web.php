<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will4r
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('doctors', DoctorController::class);
Route::resource('patients', PatientController::class);

// Route::get('/patients', [PatientController::class, 'index']);
// Route::get('/patients/create', [PatientController::class, 'create'])->name('patient.create');
