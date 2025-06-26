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
// users
Route::get('/manage/users', [ManageController::class, 'page_manage_users'])->name('page.manage.users');
Route::post('/manage/users/add', [ManageController::class, 'api_manage_users_add'])->name('api.manage.users.add');
Route::put('/manage/users/edit', [ManageController::class, 'api_manage_users_edit'])->name('api.manage.users.edit');
Route::delete('/manage/users/delete', [ManageController::class, 'api_manage_users_delete'])->name('api.manage.users.delete');
// companys
Route::get('/manage/companys', [ManageController::class, 'page_manage_companys'])->name('page.manage.companys');
Route::get('/manage/stop/companys', [ManageController::class, 'page_manage_stop_companys'])->name('page.manage.stop.companys');
Route::get('/manage/delete/companys', [ManageController::class, 'page_manage_delete_companys'])->name('page.manage.delete.companys');
Route::POST('/manage/companys/add', [ManageController::class, 'api_manage_companys_add'])->name('api.manage.companys.add');
Route::POST('/manage/companys/stop', [ManageController::class, 'api_manage_companys_stop'])->name('api.manage.companys.stop');
Route::POST('/manage/companys/cancel/stop', [ManageController::class, 'api_manage_companys_cancel_stop'])->name('api.manage.companys.cancel.stop');
Route::PUT('/manage/companys/edit', [ManageController::class, 'api_manage_companys_edit'])->name('api.manage.companys.edit');
Route::DELETE('/manage/companys/delete', [ManageController::class, 'api_manage_companys_delete'])->name('api.manage.companys.delete');
// products
Route::get('/manage/products', [ManageController::class, 'page_manage_products'])->name('page.manage.products');
Route::post('/manage/products/add', [ManageController::class, 'page_manage_products_add'])->name('page.manage.products.add');
