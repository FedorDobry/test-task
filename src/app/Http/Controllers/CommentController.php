<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addComment(Request $request)
    {
        $comment = $request->input('comment');
        $article_id = (int)$request->input('article_id');

        $objComment = new Comment();
        $objComment = $objComment->create([
            'article_id' => $article_id,
            'comment' => $comment
        ]);

        if ($objComment) {
            return back();
        }

        return back();
    }
}
