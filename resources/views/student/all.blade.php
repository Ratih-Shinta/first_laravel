<!-- resources/views/student/index.blade.php -->

@extends('layouts.main')

@section('container')
  <!-- tempat content -->
  <h1>Ini adalah halaman students</h1>
  <a class="btn btn-secondary" href="/student/create/">Add New Data</a>

  @if (session()->has('success'))
      <div class="alert alert-success col-lg012" role="alert">
        {{ session ('success') }}
      </div>
  @endif

  <table class="table">
    <thead>
      <tr>
        <th scope="col">nis</th>
        <th scope="col">nama</th>
        <th scope="col">kelas</th>
        <th scope="col">alamat</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($students as $student)
      <tr>
        <td>{{$student->nis}}</td>
        <td>{{$student->nama}}</td>
        <td>{{$student->kelas->kelas}}</td>
        <td>{{$student->alamat}}</td>
        
        <td>
          <!-- Tombol Detail -->
          <a type="button" class="btn btn-primary" href="/student/detail/{{$student->id}}">Detail</a>
          <!-- Tombol Edit -->
          <a type="button" class="btn btn-warning" href="/student/edit/{{$student->id}}">Edit</a>
          <!-- Tombol Delete -->
          <form method="post" action="{{ route('students.delete', ['student' => $student->id]) }}" onsubmit="return confirm('Are you sure you want to delete this student?')" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
