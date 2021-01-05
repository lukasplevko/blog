<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PagesController extends Controller
{
    public function home()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('pages.home')->with('posts', $posts);
    }
    public function show(Request $request)
    {
        $post = Post::where('slug', $request->slug)->get();
        return view('pages.article')->with('post', $post);
    }
}
