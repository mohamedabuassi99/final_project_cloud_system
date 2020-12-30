<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function index()
    {
        $courses = Course::all();
        return view('admin.course.index',compact('courses'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('admin.course.create',compact('departments'));
    }

    public function store(Request $request)
    {
        $course = Course::create($request->all());
        return back()->with('success','Course added successfully');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return back()->with('delete_course','Course deleted successfully');
    }
}
