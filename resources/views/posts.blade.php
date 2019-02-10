@extends('layout')

@section('js')
    <script>
        $(function(){
            $('.openit').click(function(){
                $('#comform-'+$(this).closest('tr').attr('data-id')).find('.inps').val('');
                $('#comform-'+$(this).closest('tr').attr('data-id')).fadeIn(300);
            });

            $('.closeit').click(function(){
                $(this).closest('tr').fadeOut(300);
            });
        });
    </script>
@endsection

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
    <p>Retrive Posts<a href="{{route('fetch_posts')}}" class="btn btn-primary"> Click! </a></p>
    <p>Retrive Comments<a href="{{route('fetch_comments')}}" class="btn btn-primary"> Click! </a></p>
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
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr data-id="{{$post->id}}">
                        <td>{{$post->id}}</td>
                        <td>{{$post->userId}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->comments()->count()}}</td>
                        <td><a href="javascript:void(0);" class="openit">Add Comment (<span style="font-size:8px">Need Internet</span>)</a> | <a href="{{route('view_post',['id'=>$post->id])}}">View</a></td>
                    </tr>
                    <tr style="display: none;" id="comform-{{$post->id}}">
                        <td colspan="5">
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
                                <a href="javascript:void(0);" class="closeit">Cancel</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{$posts->links()}}

@endsection