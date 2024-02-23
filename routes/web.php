<?php

use Illuminate\Support\Facades\Route;
use App\Models\Students;
use App\Http\Controllers\StudentsController;
use App\Models\Kelas;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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

Route::get('/home', function (){
    return view('home',[
        "title" => "Home"
    ]);
});

Route::get('/about', function (){
    return view('about', [
        "title" => "About",
        "nama" => "shinta",
        "kelas" => "11pplg2",
        "foto" => "img/default.jpeg"
    ]);
});

Route::get('/create', function (){
    return view('create',[
        "title" => "create"
    ]);
});

// // web.php


// Route::delete('/student/delete/{student}', [StudentsController::class, 'destroy']);

Route::group(["prefix" => "/student"], function () {
    Route::get('/all', [StudentsController::class, 'index'])->name('students.all');
    Route::get('/detail/{student}', [StudentsController::class, 'show']);
    Route::get('create', [StudentsController::class, 'create']);
    // Route::get('add', [StudentsController::class, 'create']);
    Route::post('store', [StudentsController::class, 'store']);
    // Route::post('add', [StudentsController::class, 'store']);
    Route::delete('/delete/{student}', [StudentsController::class, 'destroy'])->name('students.delete');
    Route::get('/edit/{student}', [StudentsController::class, 'edit']);
    Route::post('/update/{student}', [StudentsController::class, 'update'])->name('students.update');
    Route::patch('/update/{student}', [StudentsController::class, 'update'])->name('students.update');
});

// Route::get('/student/all', [StudentsController::class, 'index'])->name('students.all');
// Route::get('/student/detail/{student}', [StudentsController::class, 'show']);
// Route::get('/student/create', [StudentsController::class, 'create']);
// Route::post('/student/store', [StudentsController::class, 'store']);
// Route::delete('/student/delete/{student}', [StudentsController::class, 'destroy'])->name('students.delete');
// Route::get('/student/edit/{student}', [StudentsController::class, 'edit']);
// Route::post('/student/update/{student}', [StudentsController::class, 'update'])->name('students.update');
// Route::patch('/student/update/{student}', [StudentsController::class, 'update'])->name('students.update');


// Route::group(["prefix" => "/student"], function () {
//     Route::get('all', [StudentsController::class, 'index']);
//     Route::get('create', [StudentsController::class, 'create']);
//     Route::get('add', [StudentsController::class, 'create']); // Mengarahkan ke fungsi 'create'
//     Route::get('/detail/{student}', [StudentsController::class, 'show']);
//     Route::post('add', [StudentsController::class, 'store']);
//     Route::get('/edit/{student}', [StudentsController::class, 'edit']);
//     Route::delete('/destroy/{student}', [StudentsController::class, 'destroy']); // Menggunakan Route::delete
//     Route::patch('/edit/{id}', [StudentsController::class, 'update']);
// });

Route::group(["prefix" => "/kelas"], function () {
    Route::get('/all', [KelasController::class, 'index'])->name('kelas.all');
    Route::get('create', [KelasController::class, 'create']);
    // Route::get('add', [KelasController::class, 'create']);
    Route::post('store', [KelasController::class, 'store']);
    // Route::post('add', [KelasController::class, 'store']);
    Route::delete('/delete/{kelas}', [KelasController::class, 'destroy'])->name('kelas.delete');
    Route::get('/edit/{kelas}', [KelasController::class, 'edit']);
    Route::post('/update/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
    Route::patch('/update/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
});

Route::get('/login/all', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register/all', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/students', [DashboardController::class, 'students'])->name('dashboard.students')->middleware('auth');
Route::get('/dashboard/kelas', [DashboardController::class, 'kelas'])->middleware('auth');