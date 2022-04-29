<?php
use App\Http\Controllers\BookController;

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

Route::as('book.')->group(function () {
	Route::get('search', [BookController::class, 'search'])->name('search');
	Route::get('/', [BookController::class, 'index'])->name('index');
	Route::post('/register', [BookController::class, 'store'])->name('store');
});
