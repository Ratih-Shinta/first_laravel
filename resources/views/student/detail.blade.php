@extends('layouts.main')

@section('container')
    {{$student->nis}} <br>
    {{$student->nama}} <br>
    {{$student->tanggal_lahir}} <br>
    {{$student->kelas}} <br>
    {{$student->alamat}} <br>

    <a href="/student/all">back</a>
@endsection