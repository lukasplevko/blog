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
            'content' => 'required|max:280',

        ]);
        $article = Post::where('slug', $request->slug)->first();
        $comment = Comment::create([
            'fullname' => $request->user()->name,
            'comment_id' => $request->comment_id,
            'user_id' => $request->user()->id,
            'post_id' => $article->id,
            'content' => $request->content,

        ]);
        return response()->json($comment);
    }
    public function EditComment(Request $request)
    {
        $comment = Comment::where('comment_id', $request->comment_id)->first();

        $this->validate($request, [
            'content' => 'required|max:280',
        ]);




        $comment->fullname       = $comment->fullname;
        $comment->comment_id     = $comment->comment_id;
        $comment->user_id = $comment->user_id;
        $comment->post_id = $comment->post_id;
        $comment->content = $request->content;
        $comment->save();
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
        $comment = Comment::where('comment_id', $request->comment_id)->first();

        $comment->delete();



        return response()->json($comment);
    }
    public function dashboard()
    {
        return view('dashboard');
    }
}
