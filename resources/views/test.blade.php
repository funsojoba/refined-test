<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>

    <link rel="stylesheet" href="{{ URL::asset('css/test.css') }}" />
</head>
<body>
    <h1>{{$exam->title}}</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <div class="form-wrapper">
        <form method="POST">
        {{-- <form action="{{ route('quiz.store') }}" method="POST"> --}}
            @csrf
    
            <div id="questions-container">
                @foreach ($questions as $question)
                    <h2>Question: {{ $question->name }}</h2>
                    <ul>
                        @foreach ($question->options as $option)
                        <div class="radio">
                            {{-- <input type="radio" id="{{$option->name}}" name="{{$question->name}}" value="{{ $option->id }}">
                            <label for="{{ $option->name }}">{{ $option->name }}</label> --}}

                            <input type="radio" id="{{$option->name}}" name="answers[{{ $question->id }}]" value="{{ $option->id }}">
                            <label for="{{ $option->name }}">{{ $option->name }}</label>
                        </div>
                        @endforeach
                    </ul>
                @endforeach

            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
    
</body>
</html>
