@extends('layouts.admin_layout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    @if(Session::has('delete_course'))
                        <div class="alert alert-danger" role="alert">
                            {{Session::get('delete_course')}}
                        </div>
                    @endif
                    <table class="table table-light col-md-12 text-center" >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>Hours</th>
                            <th>Semester</th>
                            <th>department</th>
                            <th>Student</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$course->name}}</td>
                                <td>{{$course->hours}}</td>
                                <td>{{$course->semester}}</td>
                                <td>{{$course->department->name}}</td>
                                <td>{{$course->students->count()}}</td>
                                <td>
                                    <a href="{{route('course.manege',$course)}}" class="btn btn-info">manege student</a>
                                    <a href="{{route('course.destroy',$course)}}" class="btn btn-danger">delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@stop
