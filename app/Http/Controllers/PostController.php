<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\PostRequest;
use App\Http\Requests\CommentRequest;

use Input;
use Validator;
use Redirect;
use Session;
use Auth;
use App\User;
use App\Post;
use App\Comment;

class PostController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }

	// OPTIMIZE repeating methods and variables.
	// Whenever a user likes a post, the pages is always reloaded. AJAX needed.
    public function createPost(PostRequest $request)
    {
        $post = new Post($request->all());
		$extension = Input::file('picture')->getClientOriginalExtension();
		$filename = sha1(time()) . '.' . $extension;
		
		$post->picture = $filename;

		Input::file('picture')->move('uploads/posts', $filename);
        Auth::user()->posts()->save($post);

        Session::flash('flash_message', 'Your post has been created!');
        return redirect('dashboard');
    }

    public function showPost($username, $id)
    {
        $post = Post::find($id);
        $user = User::where('username', '=', $username)->first();

        if ($user == null || $post == null) {
            abort(404);
        } else {
            return view('user.postpage', compact('post', 'user'));
        }
    }

    public function likePost($username, $id)
    {
        $post = Post::find($id);
        $user = User::where('username', '=', $username)->first();

        if ($user == null || $post == null) {
            abort(404);
        } else {
            if (!$post->isLiked(Auth::user())) {
                Auth::user()->likes()->save($post);
                $isLiked = true;
            }
            // return view('user.post', compact('post', 'user'));
            return redirect('dashboard');
        }
    }

    public function unlikePost($username, $id)
    {
        $post = Post::find($id);
        $user = User::where('username', '=', $username)->first();

        if ($user == null || $post == null) {
            abort(404);
        } else {
            if ($post->isLiked(Auth::user())) {
                Auth::user()->likes()->detach($post);
                $isLiked = false;
            }
            // return view('user.post', compact('post', 'user'));
            return redirect('dashboard');
        }
    }

    public function commentPost(CommentRequest $request, $username, $id)
    {
        $comment = new Comment($request->all());
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $id;

        $post = Post::find($id);
        $user = User::where('username', '=', $username)->first();

        if ($user == null || $post == null) {
            abort(404);
        } else {
            Auth::user()->comments()->save($comment);
            // return view('user.post', compact('post', 'user'));
            return redirect('dashboard');
        }
    }
}
