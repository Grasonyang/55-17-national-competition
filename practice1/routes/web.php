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
use App\Http\Controllers\ManageController;


Route::get('/', function () {
    return view('home');
})->name("home");

Route::get('/home', function () {
    return view('home');
})->name("home");

// auth

// page
Route::get("/login", [AuthController::class, 'page_login'])->name("page.login");
Route::post('/login', [AuthController::class, 'user_login'])->name('user.login');

Route::get("/user/new", [AuthController::class, 'page_signup'])->name("page.signup");
Route::post('/user/new', [AuthController::class, 'user_signup'])->name('user.signup');

Route::get("/logout", [AuthController::class, 'user_logout'])->name("user.logout");

// manage
Route::get('/manage', [ManageController::class, 'page_manage'])->name('page.manage');
Route::get('/users', [ManageController::class, 'page_manage_users'])->name('page.manage.users');
Route::get('/companys', [ManageController::class, 'page_manage_companys'])->name('page.manage.companys');
Route::get('/products', [ManageController::class, 'page_manage_products'])->name('page.manage.products');


// test
Route::get("/test", function(){
    return view('test');
})->name("test");