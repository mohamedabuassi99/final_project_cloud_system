@extends('layouts.admin_layout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    @if(Session::has('delete_student'))
                        <div class="alert alert-danger" role="alert">
                            {{Session::get('delete_student')}}
                        </div>
                    @endif
                    @if(Session::has('approve_student'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('approve_student')}}
                        </div>
                    @endif
                    <table class="table table-light col-md-12 text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>avatar</th>
                            <th>name</th>
                            <th>email</th>
                            <th>identity</th>
                            <th>dob</th>
                            <th>address</th>
                            <th>department</th>
                            <th>status</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td><img src="{{asset('image/avatar/'.$student->avatar)}}" width="50" alt=""></td>
                                <td>{{$student->user->name}}</td>
                                <td>{{$student->user->email}}</td>
                                <td>{{$student->identity}}</td>
                                <td>{{$student->dob}}</td>
                                <td>{{$student->address}}</td>
                                <td>{{$student->department->name}}</td>
                                <td>
                                    @if($student->status == 0 )
                                        <p class="text-danger">
                                            Under review
                                        </p>
                                    @else
                                        <p class="text-success">
                                            Accepted
                                        </p>
                                    @endif

                                </td>
                                <td>
                                    <a href="{{route('student.destroy',$student)}}" class="btn btn-danger">delete</a>
                                    @if($student->status == 0)
                                        <a href="{{route('student.approve',$student)}}"
                                           class="btn btn-primary">approve</a>
                                    @else

                                    @endif
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
