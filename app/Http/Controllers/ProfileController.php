<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProfileController extends Controller
{
    public function show(User $user){
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = $user->posts->count();
        $followersCount = $user->profile->followers->count();
        $followingCount = $user->following->count();

        return view('profiles.show',compact(['user','follows','postCount','followersCount','followingCount']));
    }

    public function edit(User $user){
        return view('profiles.edit',compact('user'));
    }

    public function update(Request $request){
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'url' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:2024']
        ]);
        $data['user_id'] = auth()->user()->id;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $file->storeAs('profiles/images/', $file_name, 'public_files');
            $data['image'] = $file_name;
        }

        auth()->user()->profile->update(
            $data
        );

        auth()->user()->update([
            'name' => $data['name']
        ]);
        return back();
    }
}
