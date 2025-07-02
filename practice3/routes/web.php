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
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;


Route::get('/',[PageController::class, 'index'])->name('home');
Route::get('/login',[PageController::class, 'login'])->name('login');
Route::get('/register',[PageController::class, 'register'])->name('register');
Route::get('/logout',[AuthController::class, 'logout'])->name('auth.logout');
Route::post('/login',[AuthController::class, 'login'])->name('auth.login');
Route::post('/register',[AuthController::class, 'register'])->name('auth.register');

Route::middleware(['auth'])->group(function(){
    Route::prefix('company')->group(function(){
        Route::get('/', [CompanyController::class, 'index'])->name('company.index');
        Route::post('/store', [CompanyController::class, 'createoredit'])->name('company.store');
        Route::get('/{id}/edit', [CompanyController::class, 'createoredit'])->name('company.edit');
        Route::get('/{id}/stop', [CompanyController::class, 'stop'])->name('company.edit');
        Route::post('/{id}/delete', [CompanyController::class, 'destroy'])->name('company.delete');
    });
    // Route::prefix('product')->group(function(){
    //     Route::get('/', [ProductController::class, 'index'])->name('company.index');
    //     Route::post('/store', [ProductController::class, 'createoredit'])->name('company.store');
    //     Route::get('/{id}/edit', [ProductController::class, 'createoredit'])->name('company.edit');
    //     Route::get('/{id}/stop', [ProductController::class, 'stop'])->name('company.edit');
    //     Route::post('/{id}/delete', [ProductController::class, 'destroy'])->name('company.delete');
    // });
    // Route::prefix('user')->group(function(){

    // });
    
});