@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <header>
                    <h2>
                        welcome : {{$user->name}}
                    </h2>
                </header>
                <div class="table-responsive">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    @if(Session::has('fail'))
                        <div class="alert alert-danger" role="alert">
                            {{Session::get('fail')}}
                        </div>
                    @endif
                    <table class="table table-dark text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم المادة</th>
                            <th>عدد الساعات</th>
                            <th>الفصل</th>
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($courses as $course)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$course->name}}</td>
                                <td>{{$course->hours}}</td>
                                <td>{{$course->semester}}</td>
                                <td>
                                    <a href="{{route('register_course',$course)}}" class="btn btn-primary">add
                                        course</a>
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
