@extends('layouts.app')

@section('content')

    @include('includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Update: {{$post->title}}
        </div>
        <div class="panel-body">
            <form action="{{route('posts.update', $post)}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="body"  cols="5" rows="5" class="form-control" >{{$post->body}}</textarea>
                </div>
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Post</button>
                </div>

            </form>
        </div>
    </div>
@stop