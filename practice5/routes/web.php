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

use App\Http\Controllers\SearchController;

Route::get('/', [SearchController::class, 'root'])->name('go');
Route::get('/heritages/{path?}', [SearchController::class, 'root'])->where('path','.*')->name('go');
Route::get('/tags/{tags?}', [SearchController::class, 'tags'])->where('tags','.*')->name('tags');
Route::get('/search/{keywords?}', [SearchController::class, 'search'])->where('keywords','.*')->name('search');




