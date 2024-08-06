@extends('layouts.app')

@section('content')
    <h1>Detail Pembelajaran Siswa</h1>

    <p><strong>ID:</strong> {{ $pembelajaranSiswa->id }}</p>
    <p><strong>Mata Pelajaran:</strong> {{ $pembelajaranSiswa->subject->name }}</p>
    @endsection
