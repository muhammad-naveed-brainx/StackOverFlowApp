<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $questions = Question::with('answers')->get();
//        ddd($questions);
        return view('questions', ['questions' => $questions] );
    }

}
