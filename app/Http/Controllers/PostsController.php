<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        if (!Auth::check()) {
            Session::flash('danger', 'Please log in!');
            return redirect()->route('login');
        }
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts|min:5|max:255',
            'body' => 'required',
        ]);

        $post = new Post($request->all());

        // Get current user_id
        $post->user_id = Auth::id();

        $post->save();

        Session::flash('success', 'Your post was successfully created!');

        return redirect()->route('posts.show', [$post->id]);
    }

    public function show($post)
    {
        $post = Post::find($post);
        $user = Auth::user();        
        return view('posts.show', compact('post', 'user'));
    }

    public function edit($id)
    {
        $post = Post::find($id);

        if (!$post->ownedBy(Auth::user())) {
            Session::flash('danger', 'You don\'t have permission to do that!');
            return redirect()->route('posts.show', [$post->id]);
        }
        
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);     

        $post = Post::find($id);

        if ($post->ownedBy(Auth::user())) {
            return $this->unautohrized($request); 
        }

        $post->title = $request->title;

        $post->body = $request->body;

        $post->save();

        Session::flash('success', 'Your post was successfully updated.');

        return redirect()->route('posts.show', [$post->id]);
    }

    public function unautohrized(Request $request)
    {
        if ($request->ajax()) {
            return respone(['message' => 'No way.'], 403);
        }   

        Session::flash('danger', 'You don\'t have permission to do that!');
        // return redirect()->route('posts.show', [$post->id]);
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post->ownedBy(Auth::user())) {
            Session::flash('danger', 'You don\'t have permission to do that!');
            return redirect()->route('posts.show', [$post->id]);
        }
        
        $post->delete();

        Session::flash('success', 'Your post was successfully deleted.');

        return redirect()->route('posts.index');
    }
}
