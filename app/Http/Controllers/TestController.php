<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Option;
use App\Models\Exam;

class TestController extends Controller
{
    public function listTest(){
        $exams = Exam::all();

        return view('students')->with('exams', $exams);
    }
    public function create($id){
        $exam = Exam::find($id);
        $questions = Question::with('options')->where('exam_id', $id)->get();

        return view('test', compact('exam', 'questions'));
    }

    public function store(Request $request, $id){
        $exam = Exam::find($id);
        $questions = Question::with('options')->where('exam_id', $id)->get();

        $validatedData = $request->validate([
            'answers.*' => 'required|exists:options,id',
        ]);
    
        $totalScore = 0;
    
        foreach ($validatedData['answers'] as $questionId => $selectedOptionId) {
            $selectedOption = Option::find($selectedOptionId);
    
            if ($selectedOption->correct_answer) {
                $totalScore++;
            }

            // save data to StudentsAnswers Table


        }
        return view('result')->with('totalScore', $totalScore);
        // return redirect("result")->with('success', 'Quiz submitted successfully. Total score: ' . $totalScore);
    
    }
}
