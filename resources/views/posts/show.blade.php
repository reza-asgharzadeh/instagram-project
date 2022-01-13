@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <img src="{{$post->postImage()}}" alt="post" class="w-100">
        </div>
        <div class="col-md-5">
            <div class="d-flex">
                <div><img src="{{$post->user->profile->profileImage()}}" alt="profile" class="rounded-circle img-fluid border w-100" style="width: 28px;height: 28px"></div>
                <div class="px-2"><a href="{{route('profile.show',$post->user->profile->id)}}" class="text-decoration-none">{{$post->user->username}}</a></div>
            </div>
            <hr>
            <div class="text-wrap pt-3 px-2">{{$post->caption}}</div>
        </div>
    </div>
</div>
@endsection
