<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'caption' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'max:2024']
        ]);
        $data['user_id'] = auth()->user()->id;

        $file = $request->file('image');
        $file_name = $file->getClientOriginalName();
        $file->storeAs('posts/images/', $file_name, 'public_files');
        $data['image'] = $file_name;

        Post::create(
            $data
        );

        return redirect()->route('profile.show',auth()->user()->id);
    }

    public function show(Post $post){
        return view('posts.show',compact('post'));
    }
}
