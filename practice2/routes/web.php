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
use App\Http\Middleware\Admin;
use App\Http\Middleware\User;


Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/login', [AuthController::class, 'page_login'])->name('login');
Route::get('/registe', [AuthController::class, 'page_registe'])->name('registe');
Route::post('/login', [AuthController::class, 'action_login'])->name('api.login');
Route::post('/logout', [AuthController::class, 'action_logout'])->name('api.logout');
Route::post('/registe', [AuthController::class, 'action_registe'])->name('api.registe');


Route::middleware(Admin::class)->group(function(){
    Route::get('/admin/manage', [ManageController::class, 'page_admin_manage_company'])->name('admin.manage');
    Route::get('/admin/manage/company', [ManageController::class, 'page_admin_manage_company'])->name('admin.manage.company');
    Route::post('/admin/manage/company/add', [ManageController::class, 'action_admin_manage_company_add'])->name('api.admin.manage.company.add');
    Route::put('/admin/manage/company/edit', [ManageController::class, 'action_admin_manage_company_edit'])->name('api.admin.manage.company.edit');
    Route::put('/admin/manage/company/stop', [ManageController::class, 'action_admin_manage_company_stop'])->name('api.admin.manage.company.stop');
    
    
    
    
    Route::get('/admin/manage/user', [ManageController::class, 'page_admin_manage_user'])->name('admin.manage.user');
    Route::post('/admin/manage/user/add', [ManageController::class, 'action_admin_manage_user_add'])->name('api.admin.manage.user.add');
    Route::put('/admin/manage/user/edit', [ManageController::class, 'action_admin_manage_user_edit'])->name('api.admin.manage.user.edit');
    Route::delete('/admin/manage/user/delete', [ManageController::class, 'action_admin_manage_user_delete'])->name('api.admin.manage.user.delete');
    
    Route::get('/admin/manage/product', [ManageController::class, 'page_admin_manage_product'])->name('admin.manage.product');
});
Route::middleware(User::class)->group(function(){
    Route::get('/user/manage', [ManageController::class, 'page_user_manage'])->name('user.manage');});





