<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use phpDocumentor\Reflection\Types\Boolean;

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
        $question = Question::with(['answers', 'votes'=>function($query){
            $query->where('vote',1);
        }])
            ->findOrFail($id);
        $answers = $question->answers;
        return view('question', ['question' => $question, 'answers'=>$answers]);
    }

    public function vote($id,$vote)
    {
        $question = Question::findOrFail($id);
        $user = auth()->user();
        $question->votes()->detach($user);
        $question->votes()->attach($user, ['vote'=>$vote]);

        return redirect()->route('question.show', ['id'=> $id]);
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('edit_question', ['question' => $question]);
    }

    public function update($id)
    {
        $question = Question::findOrFail($id);
        $question->title= \request('questionTitle');
        $question->body = \request('questionBody');
        $question->save();
        return redirect()->route('question.index');
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return redirect()->route('question.index');
    }

}
