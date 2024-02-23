@extends('dashboard.layouts.main')

@section('container')
  <h1>ini adalah halaman edit kelas</h1>
  <a href="kelas.all">kembali</a>

  <form action="/kelas/update/ {{$kelas->id}}" method="post" id="edit-form">
    @method('PATCH')
    @csrf

  {{-- <div class="form-group">
    <label for="no">no:</label>
    <input type="number" name="no" id="no" class="form-control" required value="{{ old('no', $kelas->no) }}" disable> --}}

  <div class="form-group">
    <label for="kelas">kelas:</label>
    <input type="text" name="kelas" id="kelas" class="form-control" required value="{{ old('kelas', $kelas->kelas) }}">
<br>
  <button type="submit" class="btn btn-success" onclick="confirmEdit()">Edit</button>
  </form>
  
  <script>
    function confirmEdit() {
      if (confirm('Are you sure you want to edit this kelas?')) {
        document.getElementById['edit-form'].submit();
      }
    }
  </script>
@endsection