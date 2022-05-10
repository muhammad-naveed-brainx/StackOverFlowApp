<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store($id)
    {
        $answer = new Answer();
        $answer->body = \request('answerBody');
        $answer->question_id = $id;
        $answer->save();
        return redirect('/questions/'.$id);
    }
}
