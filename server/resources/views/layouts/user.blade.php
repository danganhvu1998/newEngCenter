<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GoLanguages</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .title {
            font-size: 60px;
        }
        .button {
            display: inline-block;
            border-radius: 4px;
            background-color: #ff944d;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 28px;
            padding: 20px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }
        
        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }
        
        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }
        
        .button:hover {
            background-color: #ff6600;
            padding-right: 25px;
            padding-left: 25px;
        }
        
        .button:hover span:after {
            opacity: 1;
            right: 0;
        }
    </style>
</head>
<body>
    <img style='height: 100%; width: 100%; object-fit: contain' src="storage/file/banner.jpg" alt="">
    <div id="app">
        <nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="/home">
                    <img src="/storage/file/logo.png" height="40" alt="GO LANGUAGES">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="/test"><b>Thi Thử Miễn Phí</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href=""><b>Đội Ngũ Giảng Viên</b></a>
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href=""><b>Khóa Học</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="/home#material"><b>Tài Liệu</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href=""><b>Tin Tức</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href=""><b>Bảng Vàng</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#contact"><b>Liên Hệ - Tư Vấn</b></a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ __($error) }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ __(session()->get('message')) }}
                    </div>
                @endif
                <br><br><br>
                @yield('content')
            </div>
        </main>
        <div id="contact">
            HAHAHAHA
        </div>
    </div>
</body>
</html>
