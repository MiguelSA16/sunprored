<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">   
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" class=" titulo">                   
                    <img src="{{asset('images/favicon.png')}}" alt="Sunpro Redes y Sistemas" class="favicon">
                    Sunpro Redes y Sistemas
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">                    
                    <ul class=" nav ml-auto">
                        @if (Route::has('login'))
                            @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle py-1" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-circle size-20"></i> 
                                    <span>
                                        Hola, {{ Auth::user()->name }}
                                    </span> 
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar sesión') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
        
                            @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link  text-decoration-none">
                                    <i class="fas fa-fingerprint"></i> 
                                    Login
                                </a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-link text-decoration-none">
                                    <i class="fas fa-user-plus"></i>
                                    Register
                                </a>
                                @endif
                            </li>                       
                            @endauth
                        </div>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!--JS-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
