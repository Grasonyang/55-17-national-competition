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
Route::get('/', [PageController::class, 'index'])->name('go');
Route::get('/heritages/{path?}', [PageController::class, 'index'])->where('path','.*')->name('go');
Route::get('/tags/{tag?}', [PageController::class, 'tags'])->where('tag','.*')->name('tags');
Route::get('/search/{part?}', [PageController::class, 'search'])->where('part','.*')->name('search');

