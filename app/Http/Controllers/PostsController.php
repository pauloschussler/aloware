<?php

namespace App\Http\Controllers;

use App\Http\Resources\AllPostsCollection;
use App\Models\Post;
use Inertia\Inertia;


class PostsController extends Controller
{

    public function index()
    {

        $posts = Post::with(['comments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }, 'comments.replies'])
            ->orderBy('created_at', 'desc')
            ->get();


        return Inertia::render('Home', [
            'posts' => new AllPostsCollection($posts),
        ]);
    }
}
