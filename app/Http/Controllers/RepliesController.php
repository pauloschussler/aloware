<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RepliesController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'parent_comment_id' => 'required',
            'user' => 'required|string',
            'comment' => 'required|string',
        ]);

        $parent_comment_id = $request->input('parent_comment_id');
        $parentComment = Comment::withCount('replies')->findOrFail($parent_comment_id);

        if ($parentComment->replies_count >= 3) {
            throw ValidationException::withMessages([
                'replies' => 'The comment cannot have more than 3 replies.',
            ]);
        }

        $comment = new Comment;
        $comment->parent_comment_id = $parent_comment_id;
        $comment->user = $request->input('user');
        $comment->comment = $request->input('comment');
        $comment->save();
    }
}
