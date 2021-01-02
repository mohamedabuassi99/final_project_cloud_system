@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <header class="text-center w-full ">
                    <h1>Name: {{$student->user->name}}</h1>
                </header>
                <div class="w-full block">
                    <form action="{{route('student.pay',$student)}}" class="">
                        @csrf
                        <div class="form-group">
                            <label for="">payment</label>
                            <input type="number" name="payment" class="form-control col-md-6">
                        </div>
                        <input type="submit" class="btn btn-success" value="Pay">
                    </form>

                    <table class="table table-dark text-center">
                        <thead>
                        <tr>
                            <td>#</td>
                            <td>payment</td>
                            <td>date</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($student->payments as $data)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$data->payment}} Dinar</td>
                            <td>{{$data->created_at}}</td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
