<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class PostController extends Controller
{
    //
    public function show(Post $post){
        return view('blog-post', compact('post'));

    }

    public function index(){
        $posts = auth()->user()->posts();
//        $posts = auth()->user()->posts()->paginate(5);
        return view('admin.posts.index', compact('posts'));

    }


    public function create(){
        return view('admin.posts.create');

    }

    public function store(){
        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);
        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }
        auth()->user()->posts()->create($inputs);
        session()->flash('create-message', 'Post created');
        return redirect()->route('post.index');

    }

    public function destroy(Post $post){
        $post->delete();
        session()->flash('message', 'Post was deleted');
        return back();

    }

    public function edit(Post $post){

        $this->authorize('view', $post);
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Post $post){
        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);
        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }
            $post->title = $inputs['title'];
            $post->body = $inputs['body'];

            $this->authorize('update', $post);

            $post->update();

            session()->flash('update-message', 'Post updated');

            return redirect()->route('post.index');

    }




}
