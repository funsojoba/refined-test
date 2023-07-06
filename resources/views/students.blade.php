<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>

    <link rel="stylesheet" href="{{ URL::asset('css/test.css') }}" />
</head>
<body>
    <h1>Create Quiz</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <div class="form-wrapper">
        <div class="list">
            @foreach ($exams as $exam)
            <div class="list-item">
                Go to test: &nbsp; 
                <a href="{{ route('student.test', ['id' => $exam->id]) }}">
                    {{$exam->title}}
                    </a>
            </div>
            @endforeach
        </div>
    </div>

  
</body>
</html>
