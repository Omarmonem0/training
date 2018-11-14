@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Operations</div>

                <div class="card-body">

                    <a href="{{route('posts.create')}}">Create new post</a>
                    <br>
                    <br>
                    <a href="{{route('profile.show')}}">view profile</a>
                    <br>
                    <br>
                    <a href="{{route('posts.index')}}">view posts</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
