<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required',
            'user_id' => 'required',
            'comment' => 'required',
        ]);

        $comment = new Comments;

        $comment->post_id = $request->input('post_id');
        $comment->user_id = $request->input('user_id');
        $comment->text = $request->input('comment');

        $comment->save();
    }
}
