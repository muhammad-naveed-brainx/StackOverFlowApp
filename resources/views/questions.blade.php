@extends('base_layout')

@section('content')
    <div class="d-flex p-3 mb-3 justify-content-between">
        <div><h2>Top Questions</h2></div>
        <div >
            <a href="/ask-question" class="btn btn-primary">
                Ask Question
            </a>
        </div>
    </div>
    @foreach($questions as $question)
    <article class="row px-1">
        <div class="col-sm-2">
            <div>{{$question->vote}} votes</div>
            <div>{{$question->answers->count()}} answers</div>
        </div>
        <div class="col-sm-10">
            <h4> <a href="questions/{{$question->id}}"> {{$question->title}} </a></h4>
        </div>
    </article>
    @endforeach
@endsection
