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
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;

Route::get('/',[PageController::class, 'index'])->name('home');
Route::get('/login',[PageController::class, 'login'])->name('login');
Route::get('/register',[PageController::class, 'register'])->name('register');
Route::get('/logout',[AuthController::class, 'logout'])->name('auth.logout');
Route::post('/login',[AuthController::class, 'login'])->name('auth.login');
Route::post('/register',[AuthController::class, 'register'])->name('auth.register');
