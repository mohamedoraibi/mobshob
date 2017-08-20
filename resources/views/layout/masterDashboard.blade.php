<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    {{-- get title from page the call this master page--}}
    <title>@yield('titleDashboard')</title>
    <style>

        li {
            font-size: 16px;
        }

        footer {
            color: white;
            font-size: 18px;
            background-color: #222222;
            padding-top: 8px;
            height: 35px;
        }

        .sidebarFontColor {
            color: grey;
        }

        .sidebarActive {
            color: white;
        }

        .paddingNavbar {
            padding-bottom: 50px
        }

        .paddingFotter {
            padding-top: 60px
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
            <div class="navbar-brand">
                Mob-Shop
            </div>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav ">
                <li class="@yield('home')"><a href="/">View Website</a></li>
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
<div class="paddingNavbar"></div>
<div class="container-fluid">
    <div class="row">

        <div class="col-sm-3 col-md-2 sidebar navbar-inverse">
            <ul class="nav nav-sidebar sidebarFontColor ">
                <li class="active"><a href="#" class="sidebarFontColor @yield('dashboard')">Overview <span
                                class="sr-only">(current)</span></a>
                </li>
                <li><a href="/dashboard/admins" class="sidebarFontColor @yield('Admins')">Administrators</a></li>
                <li><a href="/dashboard/users" class="sidebarFontColor @yield('Users')">Users</a></li>
                <li><a href="/dashboard/categories" class="sidebarFontColor @yield('Categories')">Categories</a></li>
                <li><a href="/dashboard/items" class="sidebarFontColor @yield('Items')">Items</a></li>
                <li><a href="#" class="sidebarFontColor @yield('Orders')">Orders</a></li>

            </ul>
        </div>

        <div class="col-md-9">
            @yield('contentDashboard')
        </div>

    </div>
</div>

<div class="paddingFotter"></div>
<footer class="container-fluid text-center navbar-fixed-bottom" style="font-size: 20px;padding-bottom: 40px">
    Mohamed Al-Oraibi &copy; {{date("Y")}}
</footer>
@yield('warning')

<script src="https://unpkg.com/vue@2.4.2"></script>
@yield('adminScript')
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>