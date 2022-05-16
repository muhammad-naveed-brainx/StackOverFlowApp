@extends('base_layout')
@section('content')
    <div class="container mt-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2>Signup!</h2>
        <form action="/register" method="post">
            @csrf
            <div class="mb-3 mt-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>

            <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>

            <div class="mb-3">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
            </div>

            <div class="mb-3">
                <label for="pwd2">Password:</label>
                <input type="password" class="form-control" id="pwd2" placeholder="Repeat password" name="password_confirmation">
            </div>


            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

@endsection
