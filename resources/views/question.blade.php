@extends('base_layout')

@section('content')
    <div>
        <div class="py-4"><h3> {{$question->title}}  </h3></div>
        <article class="row">
            <div class="col-sm-1">
                <div><a href="#" class="vote-btn"><i class="bi bi-caret-up-fill"></i></a></div>
                <div class="ps-2 vote-txt">{{$question->vote}}</div>
                <div><a href="#" class="vote-btn"><i class="bi bi-caret-down-fill"></i></a></div>
            </div>
            <div class="col-sm-11"><p> {!! $question->body !!} </p></div>
        </article>
    </div>
{{--    answers--}}
    <div class="d-flex flex-column">
        <div><h4>{{$answers->count()}} Answers</h4></div>
        @foreach($answers as $answer)
        <article>
            <div class="row">
                <div class="col-sm-1 d-flex flex-column">
                    <div class="mb-0"><a href="#" class="vote-btn"><i class="bi bi-caret-up-fill"></i></a> </div>
                    <div class="ps-2 vote-txt">{{$answer->vote}}</div>
                    <div><a href="" class="vote-btn"> <i class="bi bi-caret-down-fill"></i></a></div>
                </div>
                <div class="col-sm-11"><p> {!! $answer->body !!} </p></div>
            </div>
            </article>
        @endforeach

    </div>

{{--   Post Your answer --}}
    <div class="d-flex flex-column py-3">
        <div>
            <form action="/answers/{{$question->id}}" method="post">
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
