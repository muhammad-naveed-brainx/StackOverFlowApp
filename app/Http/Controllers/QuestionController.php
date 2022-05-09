<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function add()
    {
        $q = new Question();
        $q->title= \request('q-title');
        $q->body = \request('q-body');
        $q->save();

        return redirect()->action([QuestionController::class, 'showAll']);
    }

    public function showAll()
    {
        $questions = Question::all();
        return view('questions', ['questions' => $questions] );
    }

}
