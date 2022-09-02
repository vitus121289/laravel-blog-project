<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Post, Category};
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index() {
        return view('admin.posts.index', [
            'posts' => Post::latest()->paginate(50)
        ]);
    }
    public function create() {
        return view('admin.posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store() {
        $attributes = $this->validatePost();

        $attributes['user_id'] = auth()->id();

        if(! is_null(request()->file('thumbnail'))) { 
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        Post::create($attributes);

        return redirect('/');
    }

    public function edit(Post $post) {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Post $post) {
        $attributes = $this->validatePost($post);
        
        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post updated.');
    }

    public function destroy(Post $post) {
        $post->delete();

        return back()->with('success', 'Post deleted.');
    }

    private function validatePost(?Post $post = null): array {
        // ddd(request()->all());
        return request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'thumbnail' => is_null($post) ? ['image', 'required'] : ['image'],
            'excerpt' => ['required', 'max:255'],
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            // 'published_at' => 'required'
        ]);
    }
}
