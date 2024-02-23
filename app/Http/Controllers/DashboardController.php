<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\StudentsController;
use App\Models\Student;
use App\Models\Kelas;
use App\Http\Controllers\KelasController;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function students()
    {
        // $students = Student::all();
        // $students = Student::with('kelas')->paginate(5);
        return view('dashboard.students', [
            "title" => "student",
            "students" => Student::all(),
            'kelas' => Kelas::all()
        ]);
    }

    public function kelas()
    {
        return view('dashboard.kelas', [
            "title" => "kelas",
            "kelas" => Kelas::all()
        ]);
    }
}
