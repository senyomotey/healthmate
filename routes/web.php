<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\PatientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('visits', [VisitController::class, 'index'])->name('visits');
Route::get('visit/add', [VisitController::class, 'create'])->name('visit/add');
Route::get('visit/edit/{id}', [VisitController::class, 'edit'])->name('visit/edit');
Route::post('visit/store', [VisitController::class, 'store'])->name('visit/store');
Route::post('visit/update', [VisitController::class, 'update'])->name('visit/update');

Route::get('patients', [PatientController::class, 'index'])->name('patients');
Route::get('patient/add', [PatientController::class, 'create'])->name('patient/add');
Route::get('patient/edit/{id}', [PatientController::class, 'edit'])->name('patient/edit');
Route::post('patient/store', [PatientController::class, 'store'])->name('patient/store');
Route::post('patient/update', [PatientController::class, 'update'])->name('patient/update');

Route::get('reports', [HomeController::class, 'index'])->name('reports');
