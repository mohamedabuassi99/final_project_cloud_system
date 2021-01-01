<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
//        dd($user->student->courses);
        $all_marks =0;
        $course_number = $user->student->courses->count();
        foreach($user->student->courses as $my_course){
            $all_marks += $my_course->pivot->mark;
        }
        $gpa = $all_marks / $course_number;

        return view('home',compact('gpa'));
    }


    public function view_course_available(User $user)
    {
        $courses = Course::where('dep_id', $user->student->department->id)->get();
        return view('registration.view_courses', compact('user', 'courses'));
    }

    public function register_course(Course $course, User $user)
    {

        $user = auth()->user();
        $is_exist = DB::select('Select * from registration where student_id = ' . $user->student->id . ' And  course_id = ' . $course->id);

        if ($is_exist == null) {

            DB::table('registration')->insert([
                'student_id' => $user->student->id,
                'course_id' => $course->id
            ]);

            return back()->with('success', 'course Added successfully');
        } else {
            return back()->with('fail', 'Course already added');
        }
    }

    public function view_my_course(User $user)
    {
            return view('registration.view_my_course',compact('user'));
    }

    public function delete_course($id)
    {
        DB::table('registration')->delete($id);
        return back()->with('success','course deleted successfully');
    }

}
