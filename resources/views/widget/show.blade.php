@extends('layouts.master')

@section('title')
    <title> {{$widget->name }} Widget</title>
    @endsection

@section('content')
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="/widget">Widgets</a></li>
            <li><a href="/widget/{{$widget->id}}-{{$widget->id}}">{{ $widget->name }}</a></li>
        </ol>

        <h1>{{ $widget->name }}</h1>

    <hr/>
    <div class="panel panel-default">
        <table class="table table-striped">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Date Created</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tr>
                <td>{{$widget->id}}</td>
                <td><a href="/widget/{{$widget->id}}/edit">{{$widget->name}}</a></td>
                <td>{{$widget->created_at}}</td>
                <td><a href="/widget/{{$widget->id}}/edit"><button class="btn btn-default">Edit</button></a></td>
                <td>
                    <div class="form-group">
                        <form class="form" role="form" method="POST" action="{{url('/widget/' . $widget->id) }}">
                            <input type="hidden" name="_method" value="delete">
                            {{csrf_field()}}

                            <input class="btn btn-danger" onclick="return ConfirmDelete();" type="submit" value="Delete">
                        </form>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    @endsection

@section('scripts')
    <script>
        function ConfirmDelete()
        {
            var x = confirm('Are you sure to delete?');
            if(x)
                return true;
            else
                return false;
        }
    </script>
    @endsection