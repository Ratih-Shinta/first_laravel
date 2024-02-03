@extends('layouts.main')

@section('container')
  <h1>ini adalah halaman edit</h1>
  <form action="/student/update/ {{$student->id}}" method="post">
    @method('PATCH')
    @csrf

  <div class="form-group">
    <label for="nis">nis:</label>
    <input type="number" name="nis" id="nis" class="form-control" required value="{{ old('nis', $student->nis) }}" disable>

  <div class="form-group">
    <label for="nama">nama:</label>
    <input type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama', $student->nama) }}">

  <div class="form-group">
    <label for="tanggal_lahir">tanggal lahir:</label>
    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required value="{{ old('tanggal_lahir', $student->tanggal_lahir) }}">

  <div class="form-group">
    <label for="kelas">kelas:</label>
    <input type="text" name="kelas" id="kelas" class="form-control" required value="{{ old('kelas', $student->kelas) }}">

  <div class="form-group">
    <label for="alamat">alamat:</label>
    <input type="text" name="alamat" id="alamat" class="form-control" required value="{{ old('alamat', $student->alamat) }}">

  <button type="submit" class="btn btn-success">Edit</button>
@endsection