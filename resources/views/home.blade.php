@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">

            <div class="col-md-6">
                <div class="border px-5 rounded">
                    <img src="{{asset('image/avatar/'.auth()->user()->student->avatar)}}" class=" m-3 rounded"
                         width="150" alt="">
                    <p>Name: {{auth()->user()->name}}</p>
                    <p>Id student: {{auth()->user()->student->id}}</p>
                    <p>Email: {{auth()->user()->email}}</p>
                    <p>Date of birth: {{auth()->user()->student->dob}}</p>
                    <p>Identity: {{auth()->user()->student->identity}}</p>
                    <p>Address: <br> {{auth()->user()->student->address}}</p>
                </div>

            </div>
            <div class="col-md-6 ">
                <div class="border px-5 py-3 mt-5 rounded">
                    <p>Department: {{auth()->user()->student->department->name}}</p>
                    <p>Gpa: {{(float) $gpa}}%</p>
                    <p>Financial: {{(float) $payment - $money}} Dinar </p>

                </div>
                <div class="p-5">
                <a href="{{route('student.report',auth()->user()->student)}}" class="btn btn-info" target="_blank">Report for all information</a>
                </div>
            </div>
        </div>
    </div>
@endsection
