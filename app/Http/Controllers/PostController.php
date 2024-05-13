<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{   

    public function delete(Post $post){
        $post->delete();
        return redirect()->route('post.index')->with('success', 'You have successfully deleted a post');
    }

    public function update(Post $post, PostRequest $request){
        $incomingData = $request->validated();
        $post->update($incomingData);
        return redirect()->route('post.show', ['post' => $post->id])->with('success', 'You have successfully updated a post');;
    }
    public function edit(Post $post){
        if(auth()->user()->id === $post->user_id){
            return view('post.edit', ['post' => $post]);
        }
        else{
            return redirect()->route('post.index')->with("error", "your are not allow to edit this post");
        }
        
    }

    public function show(Post $post){
        return view('post.show', ['post' => $post]);
    }

    public function store(PostRequest $request){
        $incomingData = $request->validated();
        $incomingData['user_id'] = auth()->user()->id;
        Post::create($incomingData);
        return redirect()->route('post.index')->with('success', 'You have successfully created a post');;
    }

    public function create(){
        return view('post.create');
    }

    public function index (){
        //$posts = Post::all();

        $posts = Post::paginate(15);
        return view('post.index', ['posts' => $posts]);
    }
}
