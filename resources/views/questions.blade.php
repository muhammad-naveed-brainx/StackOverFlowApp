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
    <div class="question-summary d-flex p-3 ">
        <div class="p-2">votes and answers</div>
        <div class="p-2 bg-info flex-fill">Question Title</div>
    </div>
@endsection
