<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;


class PostsController extends Controller
{

    public function index()
    {
        return view('posts');
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

        Posts::create($request->all());

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }
}
