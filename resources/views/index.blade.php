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
        <form action="{{ route('exam.store') }}" method="POST">
            @csrf
    
            <div id="questions-container">
                <div class="question">
                    <label for="question_1">Test Name:</label><br>
                    <input type="text" name="test_name" id="test_name" required>
                </div>
            </div>
    
            <br><br>
            <button type="submit">Create Test</button>
        </form>
    </div>

  
</body>
</html>
