<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    NewsletterController,
    PostController,
    RegisterController,
    SessionController,
    PostCommentController};
use App\Http\Controllers\Admin\{
    PostController as AdminPostController};

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

/**
 * PostController routes.
 */
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

/**
 * RegisterController routes.
 */
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

/**
 * SessionController routes.
 */
Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

/**
 * AdminPostController routes.
 */
Route::middleware('can:admin')->group(function() {
    Route::get('admin/posts/', [AdminPostController::class, 'index'])->name('adminDashboard');
    Route::get('admin/posts/create', [AdminPostController::class, 'create'])->name('createPost');
    Route::post('admin/posts/store', [AdminPostController::class, 'store']);
    Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
    Route::patch('admin/posts/{post}/', [AdminPostController::class, 'update']);
    Route::delete('admin/posts/{post}/', [AdminPostController::class, 'destroy']);
});

/**
 * NewsletterController routes.
 */
Route::post('newsletter', NewsletterController::class);     // This uses and invoked method.