@extends('layout')

@section('css')
    <style>
        .mytable {
            margin-top: 15px;
        }

        .mytable th,.mytable td{
            width: 200px;
        }
    </style>
@endsection

@section('body')
    <h3>Posts</h3>
    <hr>
    <p>Retrive Posts<a href="#" class="btn btn-primary"> Click! </a></p>
    <p>Retrive Comments<a href="#" class="btn btn-primary"> Click! </a></p>
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
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>@twitter</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection