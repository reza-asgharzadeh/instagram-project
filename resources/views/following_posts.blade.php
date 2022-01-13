@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @foreach($posts as $post)
                    <img src="{{$post->postImage()}}" alt="image" class="w-100" style="width: 200px;height: 300px">
                    <p class="pt-2 h5 text-end">{{$post->caption}}</p>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
