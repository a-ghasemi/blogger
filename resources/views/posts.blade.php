@extends('layout')

@section('css')
    <style>
        .mytable {
            margin-top: 15px;
        }

        .mytable th, .mytable td {
            width: 200px;
        }
    </style>
@endsection

@section('body')
    <h3>Posts</h3>
    <hr>
    <p>Retrive Posts<a href="{{url('fetch_posts')}}" class="btn btn-primary"> Click! </a></p>
    <p>Retrive Comments<a href="{{url('fetch_comments')}}" class="btn btn-primary"> Click! </a></p>
    <hr>
    <div class="row">
        <div class="panel panel-primary">
            <table class="mytable">
                <thead>
                <tr class="filters">
                    <th>Index</th>
                    <th>User Id</th>
                    <th>Title</th>
                    <th>Comments Count</th>
                    <th>Operations</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->userId}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->comments->count()}}</td>
                        <td><a>Add Comment</a> | <a>View</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{$posts->links()}}
@endsection