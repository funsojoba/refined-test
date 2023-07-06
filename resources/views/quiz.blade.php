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
        <form action="{{ route('quiz.store', ['examId' => $examId]) }}" method="POST">
            @csrf
    
            <div id="questions-container">
                <div class="question">
                    <label for="question_1">Question 1:</label><br>
                    <input type="text" name="questions[0][name]" id="question_1" required>
    
                    <br><br>
    
                    <label>Options:</label>
                    <br>
                    <input type="text" name="questions[0][options][1]" required>
                    <br>
                    <input type="text" name="questions[0][options][2]" required>
                    <br>
                    <input type="text" name="questions[0][options][3]" required>
                    <br>
                    <input type="text" name="questions[0][options][4]" required>
    
                    <br><br>
    
                    <label for="correct_option_1">Correct Option:</label>
                    <select name="questions[0][correct_option]" id="correct_option_1" required>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                        <option value="4">Option 4</option>
                    </select>
                </div>
            </div>
    
            <button type="button" onclick="addQuestion()">+ Add Question</button>
            <br><br>
            <button type="submit">Create Test</button>
        </form>
    </div>

    <script>
        function addQuestion() {
            const questionsContainer = document.getElementById('questions-container');
            const questionCount = questionsContainer.childElementCount;
            
            const newQuestionDiv = document.createElement('div');
            newQuestionDiv.classList.add('question');

            const questionLabel = document.createElement('label');
            questionLabel.textContent = `Question ${questionCount + 1}:`;
            const questionInput = document.createElement('input');
            questionInput.type = 'text';
            questionInput.name = `questions[${questionCount}][name]`;
            questionInput.required = true;

            const optionsLabel = document.createElement('label');
            optionsLabel.textContent = 'Options:';
            const optionsContainer = document.createElement('div');

            for (let i = 1; i <= 4; i++) {
                const optionInput = document.createElement('input');
                optionInput.type = 'text';
                optionInput.name = `questions[${questionCount}][options][${i}]`;
                optionInput.required = true;
                optionsContainer.appendChild(optionInput);
                optionsContainer.appendChild(document.createElement('br'));
            }

            const correctOptionLabel = document.createElement('label');
            correctOptionLabel.textContent = 'Correct Option:';
            const correctOptionSelect = document.createElement('select');
            correctOptionSelect.name = `questions[${questionCount}][correct_option]`;
            correctOptionSelect.id = `correct_option_${questionCount + 1}`;

            for (let i = 1; i <= 4; i++) {
                const option = document.createElement('option');
                option.value = i;
                option.textContent = `Option ${i}`;
                correctOptionSelect.appendChild(option);
            }

            newQuestionDiv.appendChild(questionLabel);
            newQuestionDiv.appendChild(document.createElement('br'));
            newQuestionDiv.appendChild(questionInput);
            newQuestionDiv.appendChild(document.createElement('br'));
            newQuestionDiv.appendChild(optionsLabel);
            newQuestionDiv.appendChild(document.createElement('br'));
            newQuestionDiv.appendChild(optionsContainer);
            newQuestionDiv.appendChild(document.createElement('br'));
            newQuestionDiv.appendChild(correctOptionLabel);
            newQuestionDiv.appendChild(correctOptionSelect);

            questionsContainer.appendChild(newQuestionDiv);
        }
    </script>
</body>
</html>
