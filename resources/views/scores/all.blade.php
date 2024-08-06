<!-- resources/views/scores/all.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container">
    <h1>All Scores</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Subject</th>
                <th>Score</th>
                <th>Teacher</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($scores as $score)
            <tr>
                <td>{{ $score->id }}</td>
                <td>{{ $score->student->first_name }}</td>
                <td>{{ $score->subject->subject_name }}</td>
                <td>{{ $score->score }}</td>
                <td>{{ $score->teacher->name }}</td>
                <td>
                    <a href="{{ route('scores.show', $score->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('scores.edit', $score->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('scores.destroy', $score->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
