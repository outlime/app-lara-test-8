<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\PostRequest;
use App\Http\Requests\CommentRequest;

use Auth;
use App\User;
use App\Post;
use App\Comment;

class PostController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }

	// Optimize repeating methods and variables.
    public function createPost(PostRequest $request)
    {
        $post = new Post($request->all());

        Auth::user()->posts()->save($post);

        \Session::flash('flash_message', 'Post successful.');

        return redirect('dashboard');
    }

    public function showPost($username, $id)
    {
        $post = Post::find($id);
        $user = User::where('username', '=', $username)->first();

        if ($user == null || $post == null) {
            abort(404);
        } else {
            if ($post->isLiked(Auth::user())) {
                $isLiked = true;
            } else {
                $isLiked = false;
            }

            return view('user.post', compact('post', 'user', 'isLiked'));
        }
    }

    public function likePost($username, $id)
    {
        $post = Post::find($id);
        $user = User::where('username', '=', $username)->first();
        $isLiked = $post->isLiked(Auth::user());

        if ($user == null || $post == null) {
            abort(404);
        } else {
            if (!$isLiked) {
                Auth::user()->likes()->save($post);
                $isLiked = true;
            }
            return view('user.post', compact('post', 'user', 'isLiked'));
        }
    }

    public function unlikePost($username, $id)
    {
        $post = Post::find($id);
        $user = User::where('username', '=', $username)->first();
        $isLiked = $post->isLiked(Auth::user());

        if ($user == null || $post == null) {
            abort(404);
        } else {
            if ($isLiked) {
                Auth::user()->likes()->detach($post);
                $isLiked = false;
            }
            return view('user.post', compact('post', 'user', 'isLiked'));
        }
    }

    public function commentPost(CommentRequest $request, $username, $id)
    {
        $comment = new Comment($request->all());
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $id;

        $post = Post::find($id);
        $user = User::where('username', '=', $username)->first();
        $isLiked = $post->isLiked(Auth::user());

        if ($user == null || $post == null) {
            abort(404);
        } else {
            Auth::user()->comments()->save($comment);
            return view('user.post', compact('post', 'user', 'isLiked'));
        }
    }
}
