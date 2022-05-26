@extends('base_layout')

@section('content')
    <div>
        <div class="py-4"><h3> {{$question->title}}  </h3></div>
        <article class="row">
            <div class="col-sm-1">
                <div><a href="{{route('question.vote', ['id'=>$question->id, 'vote'=>1])}}" class="vote-btn"><i class="bi bi-caret-up-fill"></i></a></div>
                <div class="ps-2 vote-txt">{{$question->votes->count()}}</div>
                <div><a href="{{route('question.vote', ['id'=>$question->id, 'vote'=>0])}}" class="vote-btn"><i class="bi bi-caret-down-fill"></i></a></div>
            </div>
            <div class="col-sm-11"><p> {!! $question->body !!} </p></div>
            @auth
                @if($question->user_id == auth()->user()->id)
            <div class="d-flex flex-row-reverse">
                <div><a href="{{route('question.edit', ['id' => $question->id])}}">edit</a> | <a href="{{route('question.destroy', ['id' => $question->id])}}">delete</a></div>
            </div>
                @endif
            @endauth
        </article>
    </div>
{{--    answers--}}
    <div class="d-flex flex-column">
        <div><h4>{{$answers->count()}} Answers</h4></div>
        @foreach($answers as $answer)
        <article>
            <div class="row">
                <div class="col-sm-1 d-flex flex-column">
                    <div class="mb-0"><a href="{{route('answer.vote', ['id'=>$answer->id, 'vote'=>1])}}" class="vote-btn"><i class="bi bi-caret-up-fill"></i></a> </div>
                    <div class="ps-2 vote-txt">{{$answer->votes->count()}}</div>
                    <div><a href="{{route('answer.vote', ['id'=>$answer->id, 'vote'=>0])}}" class="vote-btn"> <i class="bi bi-caret-down-fill"></i></a></div>
                </div>
                <div class="col-sm-11"><p> {!! $answer->body !!} </p></div>
                @auth
                    @if($answer->user_id == auth()->user()->id)
                <div class="d-flex flex-row-reverse">
                        <div><a href="{{route('answer.edit', ['id' => $answer->id])}}">edit</a> | <a href="{{route('answer.destroy', ['id' => $answer->id])}}">delete</a></div>
                </div>
                    @endif
                @endauth
            </div>
        </article>
        @endforeach

    </div>
{{--   Post Your answer --}}
    <div class="d-flex flex-column py-3">
        <div>
            <form action="{{route('answer.store', ['id'=>$question->id])}}" method="post">
                @csrf
                <div class="mb-3 mt-3">
                    <h4><label for="answerBody">Your Answer</label></h4>
                    <textarea class="form-control mt-3" rows="5" id="answerBody" name="answerBody"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post Your Answer</button>
            </form>
        </div>
    </div>
@endsection
