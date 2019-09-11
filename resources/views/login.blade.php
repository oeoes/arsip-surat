<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <title>Hi!</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> -->
    <!-- Menu CSS -->
    <link href="{{ asset('css/sidebar-nav.min.css') }}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{ asset('css/chartist.min.css') }}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('css/colors/default.css') }}" id="theme" rel="stylesheet">

    <!-- custom css -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
</head>

<body>

    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5 pt-3">
                <div class="card p-3 border-0 shadow">
                    <div class="h4 text-center">Login</div>
                    <hr>
                    <form action="{{ route('login.auth') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('custom-js')
</body>

</html>
