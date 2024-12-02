<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class BlogPostController extends Controller
{

    public function index()
    {
        if (session('logged_in')) {
            $posts = BlogPost::all();
            return view('blog.index', compact('posts'));
        } else {
            return view('login');
        }
    }
    public function create()
    {
        if (session('logged_in')) {
            return view('create');
        } else {
            return view('login');
        }
    }

    public function store(Request $request)
    {
        if (session('logged_in')) {
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

            return redirect()->route('blog.index')->with('success', "Post successfully created");
        } else {
            return view('login');
        }
    }
}
