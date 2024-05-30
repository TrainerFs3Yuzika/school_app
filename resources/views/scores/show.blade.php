@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Score Details</h1>
    <p><strong>Teacher:</strong> {{ $score->teacher->full_name }}</p>
    <p><strong>Student:</strong> {{ $score->student->first_name }} {{ $score->student->last_name }}</p>
    <p><strong>Subject:</strong> {{ $score->subject->subject_name }}</p>
    <p><strong>Score:</strong> {{ $score->score }}</p>
</div>
@endsection
