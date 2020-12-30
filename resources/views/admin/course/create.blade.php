@extends('layouts.admin_layout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form action="{{route('course.store')}}" method="post">
                    @csrf
                    <p class="mx-5"> Add Course</p>

                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control col-md-6" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">hours</label>
                        <input type="number" name="hours" class="form-control col-md-6" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Semester</label>
                        <select name="semester" class="form-control col-md-6" id="">
                            <option value="">select semester</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Department</label>
                        <select name="dep_id" class="form-control col-md-6" id="">
                            <option value="">select Department</option>
                            @foreach($departments as $dep)
                            <option value="{{$dep->id}}">{{$dep->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <input type="submit" class="btn btn-primary" value="save">


                </form>
            </div>
        </div>
    </div>


@stop
