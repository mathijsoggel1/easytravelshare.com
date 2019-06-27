<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}o" type="image/x-icon" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <title>EasyTravelShare
        @guest
        @else
        | {{ Auth::user()->name }} 
         @endguest
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://js.stripe.com/v3/"></script>

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flag-icon.css') }}" rel="stylesheet">
    <style type="text/css">
        .how-it-works {font-family: 'Karla', sans-serif !important;}
        .navbar-nav {font-family: 'Karla', sans-serif !important;}
        .card-title {font-family: 'Karla', sans-serif !important;}
        .btn{font-family: 'Karla', sans-serif !important;}
        
        @media only screen and (max-device-width:480px) and (max-device-width:960px){
        .is_mobile{display:none;}
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar fixed-top navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                	<img src="{{ asset('images/ets_logo.png') }}" class="img-responsive" height="40px !important;">
                    <strong>EasyTravelShare</strong> 
                    <span class="is_mobile">@if(Route::getCurrentRoute()->uri() == '/')
                    -  The digital bridge between your travels and home

                    @endif</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}"><strong>{{ __('Register') }}</strong></a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                     <a class="dropdown-item" href="\{{ Auth::user()->name }}">
                                        <span style="color:#aaa;"><i class="fas fa-user"></i></span> Profile
                                    </a>

                                   

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <span style="color:#aaa;"><i class="fas fa-sign-out-alt"></i></span> Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="margin-top: 42px;">
            @yield('content')
        </main>
    </div>
    <style>
    .by-a {
    right: 0;
    bottom: 0;
    background-color: #ff4742;
    background: linear-gradient(to left,#f85032,#ff4742);
    color: #fff;
    position: fixed;
    font-weight: 500;
    z-index: 8;
    border-top-left-radius: 3px;
    padding: .5em;
    border-top: 1px solid #efefef;
    font-weight: 800;
    border-left: 1px solid #efefef;
    background: #fff;
    color: #494949;
    height: 45px;
}
.by-a:hover{text-decoration: none;;}
</style>
    <a target="_blank" class="by-a" href="https://mathijs.online">

        <p><img src="https://oggel-online.nl/img/me.jpg" class="img-fluid " style="height: 30px; border-radius: 300px;"> by mathijs.online</p></a>

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135922351-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-135922351-1');
</script>

</body>
</html>
