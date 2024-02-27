<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        return response()->json([
            'ok' => true,
            'message' => 'Comments recovred successfully',
            'data' => $comments
        ]);
    }


    public function store(StoreCommentRequest $request)
    {
        $comment = Comment::create([
            ...$request->safe()->all(),
            'like' => 0
        ]);

        return response()->json([
            'ok' => true,
            'message'=> 'Comment created successfully',
            'data' => $comment
        ], 201);
    }

    
    public function show(Comment $comment)
    {
        return response()->json([
            'ok' => true,
            'message' => 'Comment recovered successfully',
            'data' => $comment
        ]);
    }


    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update($request->safe()->all());

        return response()->json([
            'ok' => true,
            'message' => 'Comment modified successfully',
            'data' => $comment,
        ]);
    }


    public function destroy(Comment $comment)
    {    
        return response()->json([
            'ok' => true,
            'message' => 'Comment deleted successfully',
            'data' => $comment->delete(),
        ]);
    }
}
