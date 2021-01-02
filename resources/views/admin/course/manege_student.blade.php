@extends('layouts.admin_layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <header class="text-center  py-2">
                    <h1>
                        course: {{$course->name}}
                    </h1>
                </header>
                <table class="table table-dark text-center">
                    <thead>
                    <tr>
                        <th>student id</th>
                        <th>student name</th>
                        <th>student mark</th>
                        <th>input mark</th>
                        <th>submit</th>
                    </tr>
                    </thead>
                    <tbody >
                    @foreach($course->students as $co)
                        <tr>
                            <td>{{$co->id}}</td>
                            <td>{{$co->user->name}}</td>
                            <td>{{$co->pivot->mark}}</td>
                            <form action="{{route('admin.put_mark',[$course,$co])}}" method="post">
                                @csrf
                            <td>
                                <input type="number" name="mark" class="rounded">
                            </td>
                            <td>
                                <input type="submit" class="btn btn-primary" value="submit">
                            </td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@stop
