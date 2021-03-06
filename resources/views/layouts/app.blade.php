<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>10.28 กรกฎาคม BIKE @ เขื่อนวชิราลงกรณ</title>
    <link rel="icon" href="{{asset('bicycle.png')}} ">
   
     
	<script src="{{asset('js/jquery-3.4.1.js')}} "></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}} " rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"> 

     <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>     
    <!--Date Picker-->
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <!-- Styles -->
    <style>
        .kanit{
            font-family:'kanit',sans-serif;
        }
        .acenter{
            text-align:center;
        }
        .piccenter{
            display:block;
            margin-left:auto;
            margin-right:auto;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar  navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand kanit " href="{{ url('/') }}">
                <i class="fas fa-biking"></i> ระบบลงทะเบียน 10.28 กรกฎาคม BIKE @ เขื่อนวชิราลงกรณ 
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main>
            <br>
            @yield('content')
        </main>
		<br>
        
        <div class="container">
            <hr>
		    <footer class=" acenter">
            <span class="kanit">ดูแลระบบโดยกลุ่มงานดิจิทัล เขื่อนวชิราลงกรณ (ดท-ขว. อขว.) </span>
            <br> กรณีระบบมีปัญหาสามารถ แจ้งการใช้งานขัดข้องได้ทางโทรศัพท์ภายในองค์กร โทร 2040 V 3.1.3 |  11 July 2019</footer>
            <div class="acenter">Icons made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/"                 title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
       </div>
        <br>
    </div>
    <!--Javascript-->

    <script src="{{asset('/fontawesome/js/all.js')}}"></script>
</body>
</html>
