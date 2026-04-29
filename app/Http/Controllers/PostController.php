<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show'])
        ];
    }


    public function index()
    {
        return Post::all();
    }

    public function show($id)
    {
        return Post::find($id);
    }

    public function store(Request $request)
    {
        $values = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);
        //$new = Post::create($values);
        //return Post::all()->find($new->id);
        //return Route::redirect('api/posts','api/posts/{$new->id}');
        $new = $request->user()->posts()->create($values);
        return $new;
    }

    public function update(Request $request, $id)
    {
        Gate::authorize('modify', );
        //return $request;
        $values = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);
        //Post::find($id)->update($values);
        $post = Post::find($id);

        // autorizācija if ()

        $post->update($values);

        // $renew = $request->user()->posts()->find($id)->update($values);
        return $post;
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        return ['message' => 'The post was deleted.'];
    }
}