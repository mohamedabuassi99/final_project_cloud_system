@extends('layouts.admin_layout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form action="{{route('department.store')}}" method="post">
                    @csrf
                    <p class="mx-5"> Add Department</p>

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
                        <label for="">hour price</label>
                        <input type="number" name="hour_price" class="form-control col-md-6" placeholder="">
                    </div>
                    <input type="submit" class="btn btn-primary" value="save">


                </form>
            </div>
        </div>
    </div>


@stop
