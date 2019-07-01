<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>10.28 กรกฎาคม BIKE @ เขื่อนวชิราลงกรณ</title>
  
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
	<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
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
		<footer class=" acenter"><span class="kanit">ดูแลระบบโดยกลุ่มงานดิจิทัล เขื่อนวชิราลงกรณ (ดท-ขว. อขว.) </span><br> กรณีระบบมีปัญหาสามารถ แจ้งการใช้งานขัดข้องสำหรับงานนี้ <a href="https://forms.office.com/Pages/ResponsePage.aspx?id=DQSIkWdsW0yxEjajBLZtrQAAAAAAAAAAAAN__hPRVCdUQVQ4NDNKRkdFSjBGWUUwM0g1WUVaWksyRS4u">คลิก</a> หรือทางโทรศัพท์ภายในองค์กร V 2.1.0</footer>
        <br>
    </div>
    <!--Javascript-->
    <script src="https://kit.fontawesome.com/942c2b45e2.js"></script>
</body>
</html>
