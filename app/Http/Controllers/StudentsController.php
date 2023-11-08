<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    public function index() 
    {
        return view('student.all', [
            "title" => "Students",
            "students" => Student::all()
        ]);
    }

    public function show($student)
    {
        return view ('student.detail', [
            "title" => "detail.student",
            "student" => Student::find($student)
        ]);
    }
}
