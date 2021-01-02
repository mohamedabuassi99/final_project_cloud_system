<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }

    public function view_student(Course $course)
    {
        return view('admin.course.manege_student', compact('course'));
    }

    public function put_mark(Request $request,Course $course, Student $student)
    {
        $update_mark = DB::table('registration')->where('student_id',$student->id)
            ->where('course_id',$course->id)->update(['mark'=>$request->mark]);
        return back();
    }
}
