<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function show($id)
    {
        return Post::all()->find($id);
    }

    public function store(Request $request)
    {
        $values = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);
        $new = Post::create($values);
        //return Post::all()->find($new->id);
        //return Route::redirect('api/posts','api/posts/{$new->id}');
        return $new;
    }

    public function edit(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}