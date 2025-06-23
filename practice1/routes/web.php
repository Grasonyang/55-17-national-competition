<?php

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

use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
})->name("home");

Route::get('/home', function () {
    return view('home');
})->name("home");

// auth

Route::get("/login", [AuthController::class, 'login'])->name("login");
Route::get("/user/new", [AuthController::class, 'signup'])->name("signup");

// manage


// test
Route::get("/test", function(){
    return view('test');
})->name("test");