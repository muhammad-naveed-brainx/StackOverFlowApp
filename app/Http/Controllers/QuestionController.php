<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('answers')->get();
        return view('questions', ['questions' => $questions] );
    }

    public function store()
    {
        $question = new Question();
        $question->title= \request('questionTitle');
        $question->body = \request('questionBody');
        $question->save();
        return redirect()->action([QuestionController::class, 'index']);
    }

    public function create()
    {
        return view('ask_question');
    }

    public function show($id)
    {
        $question = Question::with('answers')->findOrFail($id);
        $answers = $question->answers;
        return view('question', ['question' => $question, 'answers'=>$answers]);
    }

}
