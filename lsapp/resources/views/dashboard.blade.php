@extends('layouts.app')

@section('content')
    <h1>MyProfile</h1>
        <div class = "well">
            <div class='row'>
                <div class="col-md-4 col-sm-4">
                    <img style="width:100%" src="{{ asset('storage/cover_images/'.$user->user_image) }}">
                </div>
                <div class="col-md-8 col-sm-8">
                    <h3>{{ucwords($user->name)}}</h3>
                    <p>{{$user->email}}</p>
                    <p>{{$user->phone}}</p>
                    <p>{{ucwords($user->coutry)}}</p>
                    <p>{{ucwords($user->state)}}</p>
                    <p>{{ucwords($user->city)}} - {{$user->pincode}}</p>
                    <small>Registerd on {{date('d-M-Y h:i a',strtotime($user->created_at))}}</small>  
                </div>   
                
                <a href="/lsapp/posts/{{$user->id}}/edit" class="btn btn-primary">Edit</a>
                {{Form::open(['action' => ['PostsController@destroy',$user->id],'method'=>'POST', 'class'=>'pull-right'])}}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                {{Form::close()}}
            </div>
            
        </div>
@endsection