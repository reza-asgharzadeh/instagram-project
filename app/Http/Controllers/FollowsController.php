<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        return auth()->user()->following()->toggle($user->profile);
    }

    public function showFollowingsPost(User $user){
        $followings_id = $user->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id',$followings_id)->orderByDesc('created_at')->get();
        return view('following_posts',compact('posts'));
    }

    public function following(User $user){
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $followings_id = $user->following()->pluck('profiles.user_id');
        $users = User::whereIn('id',$followings_id)->orderByDesc('created_at')->get();
        return view('following',compact(['users','follows']));
    }

    public function followers(User $user){
        $follows = (auth()->user()) ? auth()->user()->profile->followers->contains($user->id) : false;

        $followers_id = $user->profile->followers()->pluck('users.id');
        $users = User::whereIn('id',$followers_id)->orderByDesc('created_at')->get();
        return view('followers',compact(['users','follows']));
    }
}
