@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Edit Score</h1>
    <form action="{{ route('scores.update', $score->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="teacher_id">Teacher:</label>
        <select name="teacher_id" id="teacher_id">
            @foreach($teachers as $id => $name)
                <option value="{{ $id }}" @if($score->teacher_id == $id) selected @endif>{{ $name }}</option>
            @endforeach
        </select><br><br>
        <label for="student_id">Student:</label>
        <select name="student_id" id="student_id">
            @foreach($students as $id => $name)
                <option value="{{ $id }}" @if($score->student_id == $id) selected @endif>{{ $name }}</option>
            @endforeach
        </select><br><br>
        <label for="subject_id">Subject:</label>
        <select name="subject_id" id="subject_id">
            @foreach($subjects as $id => $name)
                <option value="{{ $id }}" @if($score->subject_id == $id) selected @endif>{{ $name }}</option>
            @endforeach
        </select><br><br>
        <label for="score">Score:</label>
        <input type="text" name="score" id="score" value="{{ $score->score }}"><br><br>
        <button type="submit">Update</button>
        <button type="reset" class="btn btn-secondary ms-2">Reset</button>
    </form>
</div>
@endsection
