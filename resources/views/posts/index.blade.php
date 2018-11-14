@extends('layouts.app')

@section('content')
    <div class="dropdown">
        <button class="dropbtn">order by</button>
        <div class="dropdown-content">
            <a href="{{route('posts.index',["param"=>'likes_counter'])}}">Likes</a>
            <a href="{{route('posts.index',["param"=>'dislikes_counter'])}}">DisLikes</a>
            <a href="{{route('posts.index',["param"=>'created_at'])}}">Latest</a>
            <a href="{{route('posts.index',["param"=>'created_at'])}}">Oldest</a>
        </div>
    </div>

    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Edit</th>
            <th>Trash</th>
            <th>By</th>
            <th>Like</th>
            <th>Dislike</th>
        </tr>
        </thead>
        <tbody>
        @if(count($posts) > 0)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post -> title}}</td>
                    <td>{{$post -> body}}</td>
                   @can('update-post',$post)
                    <td>
                        <a class="btn btn-info btn-xs" href="{{route('posts.edit',$post)}}">
                            edit
                        </a>
                    </td>
                    @endcan
                    @can('delete-post',$post)
                    <td>
                        <form action="{{route('posts.destroy',$post)}}" method="post" >
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button class="btn btn-xs btn-danger" type="submit">delete</button>
                        </form>
                    </td>
                     @endcan
                    @cannot('update-post',$post)
                       <td>
                           _
                       </td>
                    @endcannot
                    @cannot('delete-post',$post)
                        <td>
                            _
                        </td>
                    @endcannot

                    <td>
                        {{$post->user->name}}
                    </td>
                    <td>
                        <a class="btn btn-success tn-xs" href="{{route('like.store',[$post, 'type'=>1])}}">
                            {{ $post->likes_counter }}
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger tn-xs" href="{{route('like.store',[$post, 'type'=>-1])}}">
                            {{ $post->dislikes_counter}}
                        </a>
                    </td>



                </tr>
            @endforeach
        @else
            <tr>
                <th colspan="6" class="text-center">No posts  <a href="{{route('posts.create')}}">  Create new post</a></th>
            </tr>
        @endif

        </tbody>

    </table>

@stop
@push('styles')
    <style>
        /* Style The Dropdown Button */
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {background-color: #f1f1f1}

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
    </style>


@endpush