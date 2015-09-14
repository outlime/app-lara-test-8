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

	// Optimize repeating methods and variables.
	// Whenever a user likes a post, the pages is always reloaded. AJAX needed.
    public function createPost(PostRequest $request)
    {
        $post = new Post($request->all());

		$extension = Input::file('picture')->getClientOriginalExtension(); // getting image extension
		// $fileName = rand(11111,99999).'.'.$extension; // renaming image
		$fileName = sha1(time()).'.'.$extension;

		$post->picture = $fileName;
		
		Input::file('picture')->move('uploads/posts', $fileName); // move('destination', 'filename')

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
            // return view('user.post', compact('post', 'user', 'isLiked'));
            return redirect('dashboard');
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
            // return view('user.post', compact('post', 'user', 'isLiked'));
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
        $isLiked = $post->isLiked(Auth::user());

        if ($user == null || $post == null) {
            abort(404);
        } else {
            Auth::user()->comments()->save($comment);
            // return view('user.post', compact('post', 'user', 'isLiked'));
            return redirect('dashboard');
        }
    }

    public function showPicture()
    {
    	return 'lol?';
    }
}
