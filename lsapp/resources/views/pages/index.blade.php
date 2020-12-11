@extends('layouts.app')

@section('content')
    <div class="jumotron text-center">
        <h1>{{$title}}</h1>
        @if (Auth::guest())
            <p><a class="btn btn-primary btn-lg" href="/lsapp/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/lsapp/register" role="button">Register</a></p>
        @endif
    </div>
    
    @if (count($users)>0)
        @foreach ($users as $user)
            <div class = "well">
                <div class='row'>
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="{{ asset('storage/cover_images/'.$user->user_image) }}" alt="{{$user->user_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3>{{ucwords($user->name)}}</h3>
                        <p>{{$user->email}}</p>
                        @if ($user->user_status=='A')
                            <p>Active</p>
                        @else
                            <p>Inactive</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        {{$users->links()}}
    @else
        <p>No Users Found</p>
    @endif
    
@endsection