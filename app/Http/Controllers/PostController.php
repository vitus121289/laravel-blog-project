<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post};

class PostController extends Controller
{

    public function index() {
        return view ('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(4),
        ]);
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
