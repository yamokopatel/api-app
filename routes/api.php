<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

/*Route::get('/test', function (Request $request) {
    return ["key1" => "value1"];
});*/

/*Route::get('/posts', function(){
    return Post::all();
});*/

Route::apiResource('/posts', PostController::class);
//Route::get('/{id}', [PostController::class, 'show']);