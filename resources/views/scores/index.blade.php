@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Scores</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Guru</th>
                <th>Murid</th>
                <th>Mata Pelajaran</th>
                <th>Score</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($scores as $score)
            <tr>
                <td>{{ $score->teacher->full_name }}</td>
                <td>{{ $score->student->first_name }} {{ $score->student->last_name }}</td>
                <td>{{ $score->subject->subject_name }}</td>
                <td>{{ $score->score }}</td>
                <td>
                    <a href="{{ route('scores.show', $score->id) }}" class="btn btn-info btn-sm">Show</a>
                    <a href="{{ route('scores.edit', $score->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('scores.destroy', $score->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('scores.create') }}" class="btn btn-success">Add Score</a>
</div>
@endsection
