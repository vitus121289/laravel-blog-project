<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post, Category};

class PostController extends Controller
{

    public function index() {
        // dd(request(['category'])['category']);

        return view ('posts', [
            'posts' => Post::latest()->filter(request(['search', 'category']))->get(),
            'currentCategory' => Category::firstWhere('slug', request('category')),
            'categories' => Category::all()
        ]);
    }
}
