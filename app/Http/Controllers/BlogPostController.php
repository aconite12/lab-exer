<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class BlogPostController extends Controller
{
    public function create()
    {
        return view('create_blog');
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|min:10",
            "content" => "required|min:100",
        ], [
            "title.required" => "title is required",
            "title.min" => "minimum title is 10 characters",
            "content.required" => "content is required",
            "content.min" => "minimum content is 100 characters"
        ]);

        BlogPost::create([
            "title" => $request->title,
            "content" => $request->content,
            "user_id" => session('user_id'),
        ]);

        return redirect()->route('post_blog')->with('success', "Post successfully created");
    }

    public function show($id)
    {
        $post = BlogPost::find($id);
        return view('show_blog', compact('post'));
    }
}