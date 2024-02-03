<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        return view(
            '/kelas/all',
            [
                "title" => "Kelas",
                "kelas" => Kelas::all()
            ]
        );
    }

    public function show($kelas)
    {
        return view('kelas.detail', [
            "title" => "detail-kelas",
            "kelas" => Kelas::find($kelas)
        ]);
    }

    public function create()
    {
        return view('kelas.create', [
            'title' => 'Add Kelas',
            'kelas' => new Kelas(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kelas' => 'required',
        ]);

        $result = Kelas::create($validatedData);
        if ($result) {
            return redirect('/kelas/all')->with('success', 'Data Kelas added successfully');
        }
    }

    public function edit($kelas)
    {
        return view('kelas.edit', [
            "title" => "Edit kelas",
            "kelas" => Kelas::find($kelas)
        ]);
    }

    public function destroy($kelas)
    {
        $kelas = Kelas::find($kelas);
        if ($kelas) {
        $kelas->delete();
        return redirect('/kelas/all')->with('success', 'Data kelas berhasil dihapus.');
        } else {
        return redirect('/kelas/all')->with('error', 'Kelas tidak ditemukan.');
        }
    }

    public function update(Request $request, $kelas)
    {
        $kelas = Kelas::find($kelas);

        if ($kelas) {
        $kelas->update([
            'kelas' => $request->kelas,
        ]);

        return redirect('/kelas/all')->with('success', 'Data kelas berhasil diperbarui.');
        }
    }
}
