@extends('layouts.main')

@section('container')
  <h1>ini adalah halaman add new kelas</h1>
  <form action="/kelas/store" method="post">
    @csrf
    <div class="form-group">
      <label for="kelas">kelas:</label>
      <input type="text" name="kelas" id="kelas" class="form-control" required value="{{ old('kelas') }}">
    </div>
    <button type="submit" class="btn btn-success">Add</button>
  </form>
  <script>
    function confirmAdd() {
      if (confirm('Are you sure you want to delete this kelas?')) {
        document.forms[0].submit();
      }
    }
  </script>
@endsection