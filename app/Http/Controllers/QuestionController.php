<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use phpDocumentor\Reflection\Types\Boolean;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
//        $questions = Question::with('answers')->get();
        $questions = Question::with(['answers', 'votes'=>function($query){
            $query->where('vote',1);
        }])->get();

        return response()->json($questions);


//        return view('questions', ['questions' => $questions] );
    }

    public function store(Request $request)
    {
        $question = new Question();
        $question->title= $request->questionTitle;
        $question->body = $request->questionBody;
//        $question->user_id = auth()->user()->id;
        $question->save();
        return response()->json($question, 201);

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

        return response()->json($question);
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
        $user = auth()->user();
        $question = Question::findOrFail($id);

        if ($user->id != $question->user_id){
            return "You are not authorized to edit this question Please login and try again";
        }
        return view('edit_question', ['question' => $question]);
    }

    public function update(Request $request, $id)
    {

//        return "Hello world you hit update method wit id = " . $id;
        $question = Question::findOrFail($id);
        $question->title= $request->questionTitle;
        $question->body = $request->questionBody;
        $question->save();
        return response()->json($question);
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return response()->json($question, 200);
    }

}
