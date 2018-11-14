@extends('layouts.app')

@section('content')
    @include('includes.errors')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create new post
        </div>
        <div class="panel-body">
            <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="body"  cols="5" rows="5" class="form-control"></textarea>
                </div>
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Store Post</button>
                </div>

            </form>
        </div>
    </div>
@stop