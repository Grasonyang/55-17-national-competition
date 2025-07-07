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
use App\Http\Controllers\FileController;
Route::get('/', [FileController::class, 'index'])->name('go');
Route::get('heritages/{path?}', [FileController::class, 'index'])->where('path',".*")->name('go');
