@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2 mx-5">
            <img src="{{ $user->profile->profileImage() }}" alt="profile" class="rounded-circle border w-100 img-fluid" style="height: 180px">
        </div>

        <div class="col-md-5">
            <div class="d-flex justify-content-between align-items-center">
                <div class="fs-5">{{$user->username}}</div>
                @if($user->id != auth()->user()->id)
                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                @endif
                <a href="{{route('profile.edit',$user->id)}}" class="btn btn-sm btn-light border">Edit Profile</a>
            </div>

            <div class="d-flex justify-content-between align-items-center pt-2">
                <div><strong>{{$postCount}}</strong> posts</div>
                <div><strong>{{$followersCount}}</strong> <a href="{{route('followers.list',$user->id)}}" class="text-decoration-none text-dark">followers</a></div>
                <div><strong>{{$followingCount}}</strong> <a href="{{route('following.list',$user->id)}}" class="text-decoration-none text-dark">following</a></div>
            </div>

            <div class="pt-4"><strong>{{$user->name}}</strong></div>
            <div class="text-muted">Software</div>
            <div>{{$user->profile->description}}</div>
            <div><a href="{{$user->profile->url}}" class="text-decoration-none">{{$user->profile->url}}</a></div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-2">
            <div class="d-flex">
                <a href="{{route('post.create')}}" class="text-decoration-none text-decoration-none">Create a new post</a>
            </div>
        </div>
        <div class="col-md-10">
            <div class="d-flex justify-content-center">
                <div class="mx-4"><a href="{{route('show.following',$user->id)}}" class="text-decoration-none">Home</a></div>
                <div class="mx-4">posts</div>
                <div class="mx-4">videos</div>
                <div class="mx-4">saved</div>
                <div class="mx-4">Tagged</div>
            </div>
        </div>
    </div>
    <div class="row pt-2">
        @foreach($user->posts as $post)
        <div class="col-md-4 mb-4">
            <a href="{{ route('post.show',$post->id) }}"><img src="{{ $post->postImage() }}" alt="post" class="img-fluid rounded" style="width: 400px;height:400px"></a>
        </div>
        @endforeach
    </div>
</div>
@endsection
