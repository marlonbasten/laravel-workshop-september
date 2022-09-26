<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [TestController::class, 'index'])->name('index');

// Route::prefix('/post')->name('post.')->group(function () {
//     Route::get('/', [])->name('index');
//     Route::get('/create', [])->name('create');
//     Route::post('/', [])->name('store');
// });

Route::resource('post', PostController::class)->only(['index', 'create', 'store']);
