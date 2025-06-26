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
// 首頁 - 所有內容總覽

use App\Http\Controllers\PageController;
Route::get('/', [PageController::class, 'index'])->name('index');

// Route::get('/XX_module_c/', [PageController::class, 'index'])->name('index');

Route::get('/heritages/{path?}', [PageController::class, 'handle'])
    ->where('path', '.*')
    ->name('handle');

Route::get('/tags/{tag}', [PageController::class, 'tag'])->name('tag');

Route::get('/search', [PageController::class, 'search'])->name('search');

Route::get('/test', [PageController::class, 'test'])->name('test');
