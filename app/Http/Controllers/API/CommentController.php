<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        return response()->json([
            'ok' => true,
            'message' => 'Commentaire récupérés avec succès',
            'data' => $comments
        ]);
    }


    public function store(StoreCommentRequest $request)
    {
        $comment = Comment::create(request()->all());

        return response()->json([
            'ok' => true,
            'message'=> 'Commentaire créé avec succès',
            'data' => $comment
        ], 201);
    }
}
