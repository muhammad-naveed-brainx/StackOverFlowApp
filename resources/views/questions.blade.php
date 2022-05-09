@extends('base_layout')

@section('content')
    <div class="d-flex p-3 justify-content-between">
        <div><h1>Top Questions</h1></div>
        <div >
            <a href="/ask" class="btn btn-primary">
                Ask Question
            </a>
        </div>
    </div>
    @foreach($questions as $q)
    <article class="row px-1 py">
        <div class="col-sm-2">
            <div>{{$q->vote}} votes</div>
            <div>{{$q->answers->count()}} answers</div>
        </div>
        <div class="col-sm-10">
            <h2> <a href="questions/{{$q->id}}"> {{$q->title}} </a></h2>
        </div>
    </article>
    @endforeach
@endsection
