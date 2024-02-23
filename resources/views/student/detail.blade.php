<!-- resources/views/student/detail.blade.php -->

@extends('layouts.main')

@section('container')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Student Detail</h1>
                <p class="card-text"><strong>NIS:</strong> {{$student->nis}}</p>
                <p class="card-text"><strong>Nama:</strong> {{$student->nama}}</p>
                <p class="card-text"><strong>Tanggal Lahir:</strong> {{$student->tanggal_lahir}}</p>
                <p class="card-text"><strong>Kelas:</strong> {{$student->kelas->kelas}}</p>
                <p class="card-text"><strong>Alamat:</strong> {{$student->alamat}}</p>
                <a href="/student/all" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection