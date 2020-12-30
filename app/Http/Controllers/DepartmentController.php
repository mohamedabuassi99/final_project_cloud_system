<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index()
    {
        $departments = Department::all();
        return view('admin.department.index',compact('departments'));
    }

    public function create()
    {
        return view('admin.department.create');
    }

    public function store(Request $request)
    {
        $department = Department::create($request->all());
        return back()->with('success','Department Added Successfully');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return back();
    }



}
