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
Route::get('/heritages/{path?}', [PageController::class, 'index'])->where('path',".*")->name('go');
Route::get('/tags/{tags?}', [PageController::class, 'tags'])->where('tags',".*")->name('tags');
Route::get('/search/{search?}', [PageController::class, 'search'])->where('search',".*")->name('search');

