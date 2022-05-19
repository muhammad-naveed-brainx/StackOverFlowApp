@extends('base_layout')
@section('content')

    <div class="d-flex flex-column py-3">
        <div>
            <form action="{{route('answer.update', ['id'=>$answer->id])}}" method="post">
                @csrf
                <div class="mb-3 mt-3">
                    <h4><label for="answerBody">Edit Your Answer</label></h4>
                    <textarea class="form-control mt-3" rows="5" id="answerBody" name="answerBody">{{$answer->body}}
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Answer</button>
            </form>
        </div>
    </div>

@endsection
