<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::all();
        return view('admin.student.index', compact('students'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('auth.register', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->email = $request->name . '@iugaza.edu.ps';
        $request->email = str_replace(' ', '_', $request->email);
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password)
        ]);
        $user->attachRole('student');

        if ($request->has('avatar')) {
            $image = $request->file('avatar');
            $filename = time() . '_' . $request->name . '.' . $image->extension();
            $image->move(public_path('image/avatar'), $filename);
            $request->avatar = $filename;
        }
        $student = Student::create([
            'user_id' => $user->id,
            'dob' => $request->dob,
            'identity' => $request->identity,
            'address' => $request->address,
            'avatar' => @$request->avatar,
            'dep_id' => $request->dep_id,
        ]);
        return redirect('/login');
    }

    public function destroy(Student $student)
    {

        $image_path = '/image/avatar/' . $student->avatar;
        if (File::exists(public_path($image_path))) {
            File::delete(public_path($image_path));
        }
        $user = User::where('id', $student->user_id)->delete();
        return back()->with('delete_student', 'Student deleted Successfully');
    }

    public function approve(Student $student)
    {
        $student->update(['status' => 1]);
        return back()->with('approve_student', 'Approved student successfully');
    }

    public function report(Student $student)
    {

        $all_marks = 0;
        $hours = 0;
        foreach ($student->courses as $my_course) {
            $hours += $my_course->hours;
            if ($my_course->pivot->mark != 0) {
                $all_marks += $my_course->pivot->mark * $my_course->hours;
            }
        }
        $gpa = 0;
        if ($hours > 0) {
            $gpa = $all_marks / $hours;
        }


        return view('reports.report',compact('student','gpa'));
    }

}
