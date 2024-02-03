<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Kelas;

class StudentsController extends Controller
{
    public function index()
    {
        return view(
            '/student/all',
            [
                "title" => "Students",
                "students" => Student::all()
            ]
        );
    }

    public function show($student)
    {
        return view('student.detail', [
            "title" => "detail-student",
            "student" => Student::find($student)
        ]);
    }

    public function create()
    {
        return view('student.create', [
            'title' => 'Add Student',
            'student' => new Student(),
            "kelas" => Kelas::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => 'required|max:255',
            'nama' => 'required|max:255',
            'tanggal_lahir' => 'required',
            'kelas_id' => 'required',
            'alamat' => 'required',
        ]);

        $result = Student::create($validatedData);
        if ($result) {
            return redirect('/student/all')->with('success', 'Data Student added successfully');
        }
    }

    public function edit($student)
    {
        $kelas = Kelas::all();
        return view('student.edit', [
            "title" => "Edit student",
            "student" => Student::find($student),
            "kelas" => $kelas,
        ]);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.all')->with('success', 'Data siswa berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        // Lakukan validasi data
        $request->validate([
            'nis' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'kelas_id' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        // Lakukan update data
        $student = Student::find($id);
        if ($student) {
            $student->update([
                'nis' => $request->input('nis'),
                'nama' => $request->input('nama'),
                'tanggal_lahir' => $request->input('tanggal_lahir'),
                'kelas' => $request->input('kelas'),
                'alamat' => $request->input('alamat'),
            ]);

            // Setelah update selesai, tambahkan pesan sukses ke dalam session
            return redirect()->route('students.all')->with('success', 'Data Siswa telah diperbarui.');
        } else {
            return redirect()->route('students.all')->with('error', 'Data Siswa tidak ditemukan.');
        }
    }
}