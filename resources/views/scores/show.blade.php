@extends('layouts.master')
<br>
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card mb-4 border-0 shadow">
                    <div class="card-header bg-primary text-white border-0">
                        <h5 class="card-title mb-0">Score Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <p class="mb-2"><strong>Teacher:</strong> {{ $score->teacher->full_name }}</p>
                            <p class="mb-2"><strong>Student:</strong> {{ $score->student->first_name }} {{ $score->student->last_name }}</p>
                            <p class="mb-2"><strong>Subject:</strong> {{ $score->subject->subject_name }}</p>
                            <p class="mb-0"><strong>Score:</strong> {{ $score->score }}</p>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-center border-0">
                        <a href="{{ route('scores.edit', $score->id) }}" class="btn btn-sm btn-warning">Edit Score</a>
                        <form action="{{ route('scores.destroy', $score->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete Score</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
