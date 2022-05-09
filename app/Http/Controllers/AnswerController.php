<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function addAns($id)
    {
        $ans = new Answer();
        $ans->body = \request('ans-body');
        $ans->question_id = $id;
        $ans->save();
        return redirect('/questions/'.$id);
    }
}
