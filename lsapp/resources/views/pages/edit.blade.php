@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>
    <div class="panel-body">
        {!! Form::open(['action' => ['PostsController@update',$post->id], 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $post->name }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ $post->email }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone" class="col-md-4 control-label">Phone Number</label>

                <div class="col-md-6">
                    <input id="phone" type="number" class="form-control" name="phone" value="{{ $post->phone }}" required>

                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                <label for="country" class="col-md-4 control-label">Country</label>

                <div class="col-md-6">
                    <input id="country" type="text" class="form-control" name="country" value="{{ $post->country }}" required autofocus>

                    @if ($errors->has('country'))
                        <span class="help-block">
                            <strong>{{ $errors->first('country') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                <label for="state" class="col-md-4 control-label">State</label>

                <div class="col-md-6">
                    <input id="state" type="text" class="form-control" name="state" value="{{ $post->state }}" required autofocus>

                    @if ($errors->has('state'))
                        <span class="help-block">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                <label for="city" class="col-md-4 control-label">City</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="city" value="{{ $post->city }}" required autofocus>

                    @if ($errors->has('city'))
                        <span class="help-block">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('pincode') ? ' has-error' : '' }}">
                <label for="pincode" class="col-md-4 control-label">Pin Code</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="pincode" value="{{ $post->pincode }}" required autofocus>

                    @if ($errors->has('pincode'))
                        <span class="help-block">
                            <strong>{{ $errors->first('pincode') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="pincode" class="col-md-4 control-label">User Image</label>
                <div class="col-md-6">
                    <input id="user_image" type="file" name="user_image" class="form_control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </div>
        {{Form::hidden('_method','PUT')}}
        {!! Form::close() !!}
@endsection