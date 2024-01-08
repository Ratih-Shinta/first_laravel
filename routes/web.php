<?php

use Illuminate\Support\Facades\Route;
use App\Models\Students;
use App\Http\Controllers\StudentsController;


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

// web.php


Route::delete('/student/delete/{student}', [StudentsController::class, 'destroy']);


Route::get('/student/all', [StudentsController::class, 'index']);
Route::get('/student/detail/{student}', [StudentsController::class, 'show']);
Route::get('/student/create', [StudentsController::class, 'create']);
Route::post('/student/store', [StudentsController::class, 'store']);
Route::delete('/student/delete/{student}', [StudentsController::class, 'destroy']);