<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;


class ExamController extends Controller
{
        public function create(){
            return view('index');
        }
    
        public function store(Request $request){
            $validatedData = $request->validate([
                'test_name' => 'required',
            ]);
    
            // Create a new Exam instance
            $exam = new Exam();
            $exam->title = $request->input('test_name');
            $exam->save();
            return redirect()->route('quiz.create', ['examId' => $exam->id]);
    
        }
}
