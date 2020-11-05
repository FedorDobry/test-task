<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = (new Comment())->get();
        $params = [
            'comments' => $comments
        ];
        return view('admin.comments.comments', $params);
    }
}
