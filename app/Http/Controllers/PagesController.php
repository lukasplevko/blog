<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Controllers\Auth;

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
        $postId = Post::where('slug', $request->slug)->first();
        $comments = $postId->comments;
        return view('pages.article')->with('post', $post)->with('comments', $comments);
    }

    public function comment(Request $request)
    {
        $request->user = $request->user();
        $validated = $request->validate([
            'user' => 'nullable',
            'post_id' => 'nullable',
            'comment' => 'required|max:280',
        ]);
        $article = Post::where('slug', $request->slug)->first();
        $comment = Comment::create([
            'user' => $request->user()->name,
            'post_id' => $article->id,
            'comment' => $request->comment,
        ]);
        return response()->json($comment);
    }

    public function getPosts(Request $request)
    {

        $posts = Post::all();
        return response()->json($posts);
    }

    public function getComments(Request $request)
    {
        $postId = Post::where('slug', $request->slug)->first();
        $comments = $postId->comments;
        return response()->json($comments);
    }
    public function destroyComment(Request $request)
    {
    }
}
