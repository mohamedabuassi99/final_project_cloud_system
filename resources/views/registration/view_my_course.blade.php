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

                        @foreach($user->student->courses as $course)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$course->name}}</td>
                                <td>{{$course->hours}}</td>
                                <td>{{$course->semester}}</td>
                                <td>
                                    <a href="{{route('delete_course',$course->pivot->id)}}" class="btn btn-danger">delete course</a>
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
