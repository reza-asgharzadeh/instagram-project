@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <img src="{{ $user->profile->profileImage() }}" alt="reza" class="rounded-circle border w-100 img-fluid">
        </div>

        <div class="col-md-5">
            <div class="d-flex justify-content-between align-items-center">
                <div class="fs-5">{{$user->username}}</div>
                <button class="btn btn-sm px-4 btn-primary">Follow</button>
                <a href="{{route('profile.edit',$user->id)}}" class="btn btn-sm btn-light border">Edit Profile</a>
            </div>

            <div class="d-flex justify-content-between align-items-center pt-2">
                <div><strong>3</strong> posts</div>
                <div><strong>50</strong> followers</div>
                <div><strong>10</strong> following</div>
            </div>

            <div class="pt-4"><strong>{{$user->name}}</strong></div>
            <div class="text-muted">Software</div>
            <div>{{$user->profile->description}}</div>
            <div><a href="{{$user->profile->url}}" class="text-decoration-none">{{$user->profile->url}}</a></div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="d-flex justify-content-center">
            <div class="mx-4">posts</div>
            <div class="mx-4">videos</div>
            <div class="mx-4">saved</div>
            <div class="mx-4">Tagged</div>
        </div>
    </div>
    <div class="row pt-2">
        <div class="col-md-4 mb-4"><img src="{{asset('/images/1.png')}}" alt="post" class="img-fluid" style="width: 400px;height:400px"></div>
        <div class="col-md-4 mb-4"><img src="{{asset('/images/2.png')}}" alt="post" class="img-fluid" style="width: 400px;height:400px"></div>
        <div class="col-md-4 mb-4"><img src="{{asset('/images/3.png')}}" alt="post" class="img-fluid" style="width: 400px;height:400px"></div>
        <div class="col-md-4 mb-4"><img src="{{asset('/images/3.png')}}" alt="post" class="img-fluid" style="width: 400px;height:400px"></div>
    </div>
</div>
@endsection