<?php

namespace App\Http\Controllers;

use App\Http\Resources\AllPostsCollection;
use App\Models\Posts;
use Inertia\Inertia;


class PostsController extends Controller
{

    public function index()
    {

        $posts = Posts::with('comments')
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('Home', [
            'posts' => new AllPostsCollection($posts),
        ]);
    }
}
