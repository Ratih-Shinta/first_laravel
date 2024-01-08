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

    public function create()
    {
        return view('student.create', [
            "title" => "create.student",
            "student" => new Student()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
        ]);
    
        $student = new Student(); 
        $student->nis = $validatedData['nis'];
        $student->nama = $validatedData['nama'];
        $student->tanggal_lahir = $validatedData['tanggal_lahir'];
        $student->kelas = $validatedData['kelas'];
        $student->alamat = $validatedData['alamat'];
    
        $student->save();
    
        return redirect('/student/all')->with('success', 'Student added successfully');
    }

    // StudentsController.php

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('/student/all')->with('success', 'Student deleted successfully');
    }

}
