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
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CompanyController;

use App\Http\Middleware\Check;
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/login', function () {
    return view('auth.login');
})->name('page.login');
Route::get('/register', function () {
    return view('auth.register');
})->name('page.register');
Route::get('/public/gtin', function () {
    return view('home');
})->name('page.public.gtin');
Route::get('/public/product', function () {
    return view('home');
})->name('page.public.product');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(Check::class)->group(function(){
    Route::prefix('company')->group(function(){
        Route::get('/{stop?}', [CompanyController::class, 'index'])->name('company');
        Route::post('/store', [CompanyController::class, 'store'])->name('company.store');
        Route::put('/update/{company_id}', [CompanyController::class, 'update'])->name('company.update');
        Route::patch('/stop/{company_id}', [CompanyController::class, 'stop'])->name('company.stop');
        Route::delete('/destroy/{company_id}', [CompanyController::class, 'destroy'])->name('company.destroy');
    });
    Route::prefix('product')->group(function(){
        Route::get('/{company_id}/{stop?}', [ProductController::class, 'index'])->name('product');
        Route::post('/store/{company_id}', [ProductController::class, 'store'])->name('product.store');
        Route::put('/update/{company_id}/{product_id}', [ProductController::class, 'update'])->name('product.update');
        Route::patch('/stop/{company_id}/{product_id}', [ProductController::class, 'stop'])->name('product.stop');
        Route::delete('/destroy/{company_id}/{product_id}', [ProductController::class, 'destroy'])->name('product.destroy');
    });
});