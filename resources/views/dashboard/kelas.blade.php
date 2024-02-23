@extends('dashboard.layouts.main')

@section('container')
    <h1>ini adalah halaman kelas</h1>
    <a class="btn btn-secondary" href="/kelas/create/">Add New kelas</a>

    {{-- @if (session()->has('success'))
        <div class="alert alert-success col-lg012" role="alert">
            {{ session ('success') }}
        </div>
    @endif --}}

    <table class="table">
        <thead>
          <tr>
            <th scope="col">no</th>
            <th scope="col">nama</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
            @php
                $no = 1;
            @endphp
            @foreach ($kelas as $key => $kelas)
            <tr>
                <td>{{$no++}}</td>
                <td>{{ $kelas->kelas }}</td>
                <td>
                    <a type="button" class="btn btn-success" href="/kelas/edit/{{$kelas->id}}">edit</a>
                    <form id="delete-form-{{ $kelas->id }}"
                        action="{{ route('kelas.delete', ['kelas' => $kelas->id]) }}" method="post"
                        class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit"
                            class="btn btn-danger"
                            onclick="return confirm('Apakah kamu yakin ingin menghapus data?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection