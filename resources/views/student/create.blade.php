@extends('layouts.main')

@section('container')
  <h1>ini adalah halaman add new data</h1>
  <form action="/student/store" method="post">
    @csrf

  <div class="form-group">
    <label for="nis">nis:</label>
    <input type="number" name="nis" id="nis" class="form-control" required value="{{ old('nis') }}">

  <div class="form-group">
    <label for="nama">nama:</label>
    <input type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama') }}">

  <div class="form-group">
    <label for="tanggal_lahir">tanggal lahir:</label>
    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required value="{{ old('tanggal_lahir') }}">

  <div class="form-group">
    <label for="kelas">kelas:</label>
    <select class="form-select" name="kelas_id" id="">
      @foreach ($kelas as $kelasItem)
        <option nama="kelas_id" value="{{ $kelasItem->id }}">{{ $kelasItem->kelas }}</option>
      @endforeach
    </select>
  </div>
    {{-- <input type="text" name="kelas" id="kelas" class="form-control" required value="{{ old('kelas') }}"> --}}

  <div class="form-group">
    <label for="alamat">alamat:</label>
    <input type="text" name="alamat" id="alamat" class="form-control" required value="{{ old('alamat') }}">

  <button type="submit" class="btn btn-success" onclick="confirmAdd()">Add</button>
  <script>
    function confirmAdd() {
      if (confirm('Are you sure you want to add this data?')) {
        document.forms[0].submit();
      }
    }
  </script>
@endsection