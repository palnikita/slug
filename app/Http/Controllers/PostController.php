<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        $post->slug = str::slug($post->title);
         $post->save();


        return redirect()->route('posts.show', ['slug' => $post->slug]);
    }



    
public function show($slug)
{
    $post = Post::where('slug', $slug)->firstOrFail();
    return view('show', ['post' => $post]);
}
}
