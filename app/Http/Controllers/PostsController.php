<?php

namespace App\Http\Controllers;

use App\Http\Resources\AllPostsCollection;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;
use Inertia\Inertia;


class PostsController extends Controller
{

    public function index()
    {

        $posts = Posts::orderBy('created_at', 'desc')->get();
        return Inertia::render('Home', [
            'posts' => new AllPostsCollection($posts),
            'allUsers' => User::all()
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }
}
