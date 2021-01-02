<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use App\Models\Student;
use Illuminate\Http\Request;

class PayController extends Controller
{
    //
    public function pay(Request $request, Student $student)
    {
        $pay = Pay::create([
            'student_id'=>$student->id,
            'payment' => $request->payment
        ]);
        return back();
    }

    public function my_payment(Student $student)
    {

        return view('payments.create', compact('student'));

    }

    public function payment(Request $request, Student $student)
    {

    }

}
