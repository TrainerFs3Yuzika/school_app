<!-- resources/views/scores/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Score</title>
</head>
<body>
    <h1>Create Score</h1>
    <form action="{{ route('scores.store') }}" method="POST" id="createScoreForm">
        @csrf
        <label for="teacher_id">Teacher:</label>
        <select name="teacher_id" id="teacher_id">
            @foreach($teachers as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select><br><br>
        <label for="student_id">Student:</label>
        <select name="student_id" id="student_id">
            @foreach($students as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select><br><br>
        <label for="subject_id">Subject:</label>
        <select name="subject_id" id="subject_id">
            @foreach($subjects as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select><br><br>
        <label for="score">Score:</label>
        <input type="number" name="score" id="score" min="0" required><br><br>
        <button type="submit">Submit</button>
    </form>

    <script>
        // Validasi di sisi klien menggunakan HTML5
        document.getElementById('createScoreForm').addEventListener('submit', function(event) {
            const scoreInput = document.getElementById('score');
            if (scoreInput.validity.rangeUnderflow) {
                alert('Score must be greater than or equal to 0.');
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
