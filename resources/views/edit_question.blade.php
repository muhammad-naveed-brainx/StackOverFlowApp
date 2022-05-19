@extends('base_layout')
@section('content')

    <div class="container mt-3">
        <div class="py-4"><h2>Edit question</h2></div>

        <form action="{{route('question.update', ['id'=>$question->id])}}" method="post">
            @csrf
            <div class="mb-3 mt-3">
                <label class="fw-bold" for="questionTitle">Title:</label>
                <p><small>Be specific and imagine you’re asking a question to another person</small></p>
                <input type="text" class="form-control" id="questionTitle" placeholder="e.g. Is there an R function for finding a vector?"
                       value="{{$question->title}}" name="questionTitle">
            </div>

            <div class="mb-3">
                <label class="fw-bold" for="questionBody">Body:</label>
                <p><small>Include all the information someone would need to answer your question</small></p>
                <textarea class="form-control" rows="5" id="questionBody" name="questionBody">{{$question->body}}
                </textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update your question</button>
        </form>
    </div>

@endsection
