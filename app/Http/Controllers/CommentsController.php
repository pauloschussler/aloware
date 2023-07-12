<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function store(Request $request)
    {

        $validated = $request->validate([
            // 'post_id' => 'required',
            'user' => 'required|string',
            'comment' => 'required|string',
        ]);

        $comment = new Comments;

        $comment->post_id = $request->input('post_id');
        $comment->user = $request->input('user');
        $comment->comment = $request->input('comment');

        $comment->save();
    }
}
