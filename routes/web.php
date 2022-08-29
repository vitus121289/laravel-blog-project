<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PostController, RegisterController};

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

/*
These are the routes for a GET request.
*/
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('post/{post:slug}', [PostController::class, 'show']);
Route::get('register', [RegisterController::class, 'create']);

/*
These are the routes for a POST request.
*/
Route::post('register', [RegisterController::class, 'store']);