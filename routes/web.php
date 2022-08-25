<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PostController};
use App\Models\{Post, Category, User};

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

Route::get('/', [PostController::class, 'index']);

Route::get('post/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function(Category $category) {
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
        // 'posts' => $category->posts->load(['category', 'author'])
    ]);
});

Route::get('author/{user:username}', function(User $user) {
    return view('posts', [
        'posts' => $user->posts
        // 'posts' => $user->posts->load(['category', 'author'])
    ]);
});
