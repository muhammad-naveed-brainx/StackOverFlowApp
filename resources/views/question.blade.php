@extends('base_layout')

@section('content')
    <article>
        <div class="py-3"><h2> {{$question->title}}  </h2></div>
        <div class="row">
            <div class="col-sm-1">
                <div class="mb-0"><h1><i class="bi bi-caret-up-fill"></i></h1></div>
                <div><h1>{{$question->vote}}</h1></div>
                <div><h1><i class="bi bi-caret-down-fill"></i></h1></div>
            </div>
            <div class="col-sm-11"><p> {!! $question->body !!} </p></div>
        </div>
    </article>
{{--    answers--}}
    <div class="d-flex flex-column">
        <div><h4>{{$question->count()}} Answers</h4></div>
        @foreach($question->answers as $ans)
        <article>
            <div class="row">
                <div class="col-sm-1 d-flex flex-column justify-content-center">
                    <div class="mb-0"><h1><i class="bi bi-caret-up-fill"></i></h1></div>
                    <div><h1>{{$ans->vote}}</h1></div>
                    <div><h1><i class="bi bi-caret-down-fill"></i></h1></div>
                </div>
                <div class="col-sm-11"><p> {!! $ans->body !!} </p></div>
            </div>
            </article>
        @endforeach

    </div>

{{--   Post Your answer --}}
    <div class="d-flex flex-column">
        <div>
            <form action="/answers/{{$question->id}}" method="post">
                @csrf
                <div class="mb-3 mt-3">
                    <h3><label for="ans-body">Your Answer</label></h3>
                    <textarea class="form-control mt-3" rows="5" id="ans-body" name="ans-body"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post Your Answer</button>
            </form>
        </div>
    </div>
@endsection
