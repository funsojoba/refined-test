<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Option;

class QuizController extends Controller
{
    public function create($examId)
    {
        return view('quiz', compact("examId"));
    }

    public function store(Request $request, $examId)
    {
        $validatedData = $request->validate([
            'questions.*.name' => 'required|string|max:255',
            'questions.*.options.*' => 'required|string|max:255',
            'questions.*.correct_option' => 'required|in:1,2,3,4',
        ]);
    
        foreach ($validatedData['questions'] as $questionData) {
            error_log($questionData['name']);
            $question = new Question();
            
            $question->name = $questionData['name'];
            $question->exam_id = $examId;
            $question->save();
    
            foreach ($questionData['options'] as $optionIndex => $optionName) {
                $correctAnswer = ($optionIndex + 1) == $questionData['correct_option'];
    
                $option = new Option();
                $option->question_id = $question->id;
                $option->name = $optionName;
                $option->correct_answer = $correctAnswer;
                $option->save();
            }
        }
    
        return redirect()->back()->with('success', 'Quiz created successfully.');
    }
}
