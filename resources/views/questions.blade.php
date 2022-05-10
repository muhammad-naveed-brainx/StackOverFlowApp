@extends('base_layout')

@section('content')
    <div class="d-flex py-5 mb-3 justify-content-between">
        <div><h2>Top Questions</h2></div>
        <div >
            <a href="{{route('question.create')}}" class="btn btn-primary">
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
            <h4> <a href="{{route('question.show', ['id' => $question->id])}}"> {{$question->title}} </a></h4>
        </div>
    </article>
    @endforeach
@endsection
