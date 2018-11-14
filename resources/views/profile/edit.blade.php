@extends('layouts.app')

@section('content')

    @include('includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Update: {{$user->name}}
        </div>
        <div class="panel-body">
            @php($user = auth()->user())
            <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="content">Email</label>
                    <input name="email" type="email" class="form-control"  value="{{$user->email}}w">
                </div>
                <div class="form-group">
                    <label for="title">phone</label>
                    <input type="tel" class="form-control" name="phone" id="phone" value="{{$user->phone}}">
                </div>

                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Profile</button>
                </div>

            </form>
        </div>
    </div>
@stop