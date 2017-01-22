<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts|min:5|max:255',
            'body' => 'required',
        ]);

        $post = new Post($request->all());
        
        $post->save();

        Session::flash('success', 'Your post was successfully created!');

        return redirect()->route('posts.show', [$post->id]);
    }

    public function show($post)
    {
        $post = Post::find($post);

        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);     

        $post = Post::find($id);

        $post->title = $request->title;

        $post->body = $request->body;

        $post->save();

        Session::flash('success', 'Your post was successfully updated.');

        return redirect()->route('posts.show', [$post->id]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'Your post was successfully deleted.');

        return redirect()->route('posts.index');
    }
}
