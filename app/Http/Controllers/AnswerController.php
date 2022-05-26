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
        $answer->user_id = auth()->user()->id;
        $answer->save();
        return redirect()->route('question.show', ['id'=> $id]);
    }

    public function vote($id,$vote)
    {
        $answer = Answer::findOrFail($id);
        $user = auth()->user();

        $answer->votes()->detach($user);
        $answer->votes()->attach($user, ['vote'=>$vote]);
        // We are getting id for question but inorder to render question page we need relevant question id
        $questionId = $answer->question->id;

        return redirect()->route('question.show', ['id'=> $questionId]);
    }

    public function edit(Request $request, $id)
    {
        $user = auth()->user();
        $answer = Answer::findOrFail($id);
        if ($user->id != $answer->user_id){
            return "You are not authorized to edit this answer Please login and try again";
        }
        return view('edit_answer', ['answer' => $answer]);
    }

    public function update(Request $request, $id)
    {
        $answer = Answer::findOrFail($id);
        $answer->body = \request('answerBody');
        $answer->save();
        $questionId = $answer->question->id;
        return redirect()->action([QuestionController::class, 'show'], ['id' => $questionId]);
    }

    public function destroy($id)
    {
        $answer = Answer::findOrFail($id);
        $questionId = $answer->question->id;
        $answer->delete();
        return redirect()->action([QuestionController::class, 'show'], ['id' => $questionId]);
    }
}
