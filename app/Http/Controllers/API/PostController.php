<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return response()->json([
            'ok' => true,
            'message' => 'Posts recovered successfully',
            'data' => Post::all(),
        ]);
    }


    public function store(StorePostRequest $request)
    {
        $post = Post::create(request()->safe()->all());

        return response()->json([
            'ok' => true,
            'message'=> 'Post created successfully',
            'data' => $post,
        ], 201);
    }


    public function show(Post $post)
    {
        return response()->json([
            'ok' => true,
            'message' => 'Post recovered successfully',
            'data' => $post
        ]);
    }


    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->safe()->all());

        return response()->json([
            'ok' => true,
            'message' => 'Post modified successfully',
            'data' => $post,
        ]);
    }


    public function destroy(Post $post)
    {    
        return response()->json([
            'ok' => true,
            'message' => 'Post deleted successfully',
            'data' => $post->delete(),
        ]);
    }
}
