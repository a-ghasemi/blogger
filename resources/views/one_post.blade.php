@extends('layout')

@section('css')
@endsection

@section('body')
    <h3>One Post</h3>
    <hr>
    <div class="row">
        <div class="panel panel-primary">
            <table class="mytable">
                <tbody>
                    <tr>
                        <th>Index</th>
                        <td>{{$post->id}}</td>
                    </tr>
                    <tr>
                        <th>User Id</th>
                        <td>{{$post->userId}}</td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td>{{$post->title}}</td>
                    </tr>
                    <tr>
                        <th>Body</th>
                        <td>{{$post->body}}</td>
                    </tr>
                    <tr>
                        <th>Operations</th>
                        <td><a href="{{route('add_comment',['id'=>$post->id])}}">Add Comment</a> | <a href="{{url('/')}}">Back To Posts</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <h3>Comments {{$post->comments()->count()}}</h3>
    <hr>
    <div class="row">
        <div class="panel panel-primary">
            <table class="mytable">
                <thead>
                <tr class="filters">
                    <th>Index</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Body</th>
                </tr>
                </thead>
                <tbody>
                @foreach($post->comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->name}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->body}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <h3>Add New Comment</h3>
    <hr>
    <form action="{{route('add_comment')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="postId" value="{{$post->id}}" />
        <b>Name : </b><input type="text" name="name" required/>
        <br>
        <b>Email : </b><input type="text" name="email" required/>
        <br>
        <b>Body : </b><textarea name="body" cols="30" rows="10"></textarea>
        <br>
        <button type="submit">Submit</button>
        <a href="{{url('/')}}">Cancel</a>
    </form>
    
@endsection