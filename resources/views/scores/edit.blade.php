@extends('layouts.master')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-9 col-lg-10 offset-md-3 offset-lg-2">
            <div class="container mt-5">
                <h1>Edit Score</h1>
                <form action="{{ route('scores.update', $score->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="teacher_id">Teacher:</label>
                        <select name="teacher_id" id="teacher_id" class="form-control">
                            @foreach($teachers as $id => $name)
                                <option value="{{ $id }}" @if($score->teacher_id == $id) selected @endif>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="student_id">Student:</label>
                        <select name="student_id" id="student_id" class="form-control">
                            @foreach($students as $id => $name)
                                <option value="{{ $id }}" @if($score->student_id == $id) selected @endif>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject_id">Subject:</label>
                        <select name="subject_id" id="subject_id" class="form-control">
                            @foreach($subjects as $id => $name)
                                <option value="{{ $id }}" @if($score->subject_id == $id) selected @endif>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="score">Score:</label>
                        <input type="text" name="score" id="score" value="{{ $score->score }}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
