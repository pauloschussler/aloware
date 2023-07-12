<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class RepliesController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            'parent_comment_id' => 'required',
            'user' => 'required|string',
            'comment' => 'required|string',
        ]);

        $comment = new Comment;

        $comment->parent_comment_id = $request->input('parent_comment_id');
        $comment->user = $request->input('user');
        $comment->comment = $request->input('comment');

        $comment->save();
    }
}
