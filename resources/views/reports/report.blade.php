<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 my-5 border">
            <div class="d-flex justify-content-between  pt-5 px-3">
                <p>Name: {{$student->user->name}}</p>
                <p>Id: {{$student->id}}</p>
                <p>Email: {{$student->user->email}}</p>
            </div>
            <hr>
            <div>
                <h3 class="text-center">Student Information</h3>
                <div class="pl-5">
                    <p>Department: {{$student->department->name}}</p>
                    <p>Course hours: {{$student->courses->sum('hours')}}</p>
                    <p> GPA: {{(float)$gpa}}%</p>

                </div>
            </div>
            <div>
                <h2 class="text-center">Courses</h2>
                <table class="text-center  table table w-50" align="center">
                    <thead>
                    <tr class="bg-dark text-white">
                        <th>#</th>
                        <th>Course </th>
                        <th>hours</th>
                        <th>mark</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($student->courses as $course)
                        <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{$course->name}}</td>
                            <td>{{$course->hours}}</td>
                            <td>{{$course->pivot->mark}}</td>
                        </tr>
                    @endforeach
                    <tr class="bg-dark text-white ">
                        <td>Total</td>
                        <td colspan="3">{{$student->courses->sum('hours')}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            <div>
                <h2 class="text-center">Payments</h2>
                <table class="text-center  table table w-50" align="center">
                    <thead>
                    <tr class="bg-dark text-white">
                        <th>#</th>
                        <th>payments</th>
                        <th>date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($student->payments as $payment)
                        <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{$payment->payment}}</td>
                            <td>{{$payment->created_at}}</td>
                        </tr>
                    @endforeach
                    <tr class="bg-dark text-white ">
                        <td>Total</td>
                        <td colspan="2">{{$student->payments->sum('payment')}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            <div>
                <h2 class="text-center">Financial</h2>
                <h4 class="text-center">{{$student->payments->sum('payment') - $student->courses->sum('hours') * $student->department->hour_price}} Dinar</h4>
            </div>
        </div>
    </div>
</div>

</body>
</html>
