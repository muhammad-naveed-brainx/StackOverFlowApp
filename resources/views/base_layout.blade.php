

<!DOCTYPE html>
<html>

<head>
    <title>posts-app laravel</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    {{--Jquery CDN--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
<!-- A grey horizontal navbar that becomes vertical on small screens -->
<nav class="navbar navbar-expand-sm bg-light">

    <div class="container-fluid">
        <!-- Links -->
        <ul class="nav navbar-nav navbar-right">
            @auth
                <span>Welcome, {{auth()->user()->name}}</span>

                <li class="nav-item">
                    <form action="{{route('user.logout')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link">Logout</button>
                    </form>
                </li>
            @else

            <li class="nav-item">
                <a class="nav-link" href="{{route('user.create')}}">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.createLogin')}}">Login</a>
            </li>
            @endauth
        </ul>
    </div>

</nav>
@yield('content')
</body>

</html>
