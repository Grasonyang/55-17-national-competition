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
use App\Http\Controllers\FolderController;
Route::get('/', [FolderController::class, 'index'])->name('index');
Route::prefix('heritages')->group(function(){
    Route::get('/{path}', [FolderController::class, 'index'])->where('path',".*")->name('index');
    Route::get('/tags', [FolderController::class, 'tags'])->name('tags');
    Route::get('/tags/{tag}', [FolderController::class, 'tag_find'])->where('path',".*")->name('tags.find');
});