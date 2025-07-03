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
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/login', function () {
    return view('auth.login');
})->name('page.login');
Route::get('/register', function () {
    return view('auth.register');
})->name('page.register');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function(){
    Route::prefix('company')->group(function(){
        Route::get('/', [CompanyController::class, 'index'])->name('company');
        Route::post('/add', [CompanyController::class, 'storeOrUpdate'])->name('company.add');
        Route::put('/edit/{company_id}', [CompanyController::class, 'storeOrUpdate'])->name('company.edit');
        Route::get('/show/{user_id}', [CompanyController::class, 'show'])->name('company.show');
        Route::get('/stop/show/{user_id}', [CompanyController::class, 'stop_show'])->name('company.stop.show');
        
        Route::put('/stop/{company_id}', [CompanyController::class, 'stop'])->name('company.stop');
        Route::delete('/dele/{company_id}', [CompanyController::class, 'destroy'])->name('company.dele');
    });
    Route::prefix('product')->group(function(){
        Route::get('/', [ProductController::class, 'index'])->name('product');
        Route::post('add', [ProductController::class, 'storeOrUpdate'])->name('product.add');
        Route::put('edit/{product_id}', [ProductController::class, 'storeOrUpdate'])->name('product.edit');
        Route::get('show', [ProductController::class, 'show'])->name('product.show');
        Route::get('stop/show', [ProductController::class, 'stop_show'])->name('product.stop.show');
        Route::put('stop/{product_id}', [ProductController::class, 'stop'])->name('product.stop');
        Route::delete('dele/{product_id}', [ProductController::class, 'destroy'])->name('product.dele');
    });
});