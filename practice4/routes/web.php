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


Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/registe', function () {
    return view('auth.registe');
})->name('page.login');
Route::get('/login', function () {
    return view('auth.login');
})->name('page.login');
Route::get('/logout', [AuthController::class, 'route_logout'])->name('logout');
Route::post('/login', [AuthController::class, 'route_login'])->name('login');
Route::post('/registe', [AuthController::class, 'route_registe'])->name('registe');



Route::middleware(['auth'])->group(function(){
    Route::prefix('/company')->group(function(){
        Route::get('/', [CompanyController::class, 'index'])->name('company');
        Route::post('/add', [CompanyController::class, 'store_or_update'])->name('company.add');
        Route::put('/edit/{company_id}', [CompanyController::class, 'store_or_update'])->name('company.edit');
        Route::get('/show/{user_id}', [CompanyController::class, 'show'])->name('company.show');
        Route::put('/stop/{company_id}', [CompanyController::class, 'stop'])->name('company.stop');
        Route::delete('/delete/{company_id}', [CompanyController::class, 'destroy'])->name('company.delete');
    });
    Route::prefix('product')->group(function(){
        Route::get('/', [ProductController::class, ''])->name('product');
    });
});