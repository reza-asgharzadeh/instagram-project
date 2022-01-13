@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                Followers List
                <hr>
                    @foreach($users as $user)
                    <div class="d-flex align-items-center">
                        <div><img src="{{$user->profile->profileImage()}}" alt="profile" class="w-100 rounded-circle px-3 my-3" style="width: 32px;height: 32px;"></div>
                        <div>{{$user->name}}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
