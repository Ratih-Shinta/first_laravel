@extends('layouts.main')

@section('container')
  <!-- tempat content -->
  <h1>Ini adalah halaman about</h1>
  <h2>nama : {{$nama}}</h2>
  <h3>kelas : {{$kelas}}</h3>
  <img src="{{$foto}}" alt="foto">
@endsection