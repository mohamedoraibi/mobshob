<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">
    <title>@yield('title')</title>
    <style>
        li {
            font-size: 16px;
        }

        footer {
            color: white;
            font-size: 18px;
            background-color: grey;
            padding-top: 8px;
            height: 35px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-static-top navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src=" http://codelab.camp/logo.jpg" style="width:40px;margin-top:-10px;" class="img-responsive"
                     alt="Responsive image">
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li class="@yield('home')"><a href="/">Home</a></li>
                <li class="@yield('iphone')"><a href="/iphone">Iphone</a></li>
                <li class="@yield('samsung')"><a href="/samsung">Samsung</a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="@yield('PatientsManagment')"><a href="/patientManagment">About Us</a></li>
                <li class="@yield('PatientsManagment')"><a href="/patientManagment">Help</a></li>
                <li class="dropdown @yield('signup') @yield('signin')">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Account <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="@yield('signup')"><a href="/auth/register">Signup</a></li>
                        <li class="@yield('signin')"><a href="/auth/login">Sign in</a></li>
                        <li><a href="#">Sign out</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div style="padding-bottom: 60px"></div>
@yield('content')
<div style="padding-top: 60px"></div>
<footer class="container-fluid text-center navbar-fixed-bottom" style="font-size: 20px;padding-bottom: 40px">
    Mohamed Al-Oraibi &copy; {{date("Y")}}
</footer>
@yield('warning')

<script src="https://unpkg.com/vue@2.4.2"></script>

<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>