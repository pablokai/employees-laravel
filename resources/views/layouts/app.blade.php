<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EMPLEADOS.APP') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @auth
    <link rel="stylesheet" href="{{ asset('/styles/dashboard.css')  }}">
    
    <script src="https://kit.fontawesome.com/79501d19d9.js" crossorigin="anonymous"></script>
    @endauth
</head>
<body>
    <div id="app">
      

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest  
                        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                            <div class="container">
                                <a class="navbar-brand" href="{{ url('/') }}">
                                    {{ config('app.name', 'Laravel') }}
                                </a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <!-- Left Side Of Navbar -->
                                    <ul class="navbar-nav me-auto">
                
                                    </ul>
                            <div class="div buttons" style="display: flex; flex-direction:row; justify-content: space-evenly; width: 10vw;">
                            @if (Route::has('login'))
                            
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        </div>
                        @else


                        <div class="sidebar">
                            <div class="logo">
                                <img src=" {{ asset('/images/employee.png') }}" alt="" class="logo-icon">
                                <a class="title" href="{{ url('/') }}">
                                    {{ config('app.name', 'EMPLEADOS.APP') }}
                                </a>
                            </div>
                            <ul>
                                <a href="{{ url('empleado/create' )}}" ><li> <i class="fas fa-user-plus"></i> Registrar empleados</li> </a>
                                <a href="{{ url('empleado/' )}}" ><li><i class="fas fa-users"></i> Lista de empleados</li> </a>
                                <li><div class="profile">
                                    <div class="top-profile">
                                    <img src="{{ asset('/storage/'.Auth::user()->photo)}}">
                                    <h2 class="name">  {{ Auth::user()->name }}</h2>
                                    </div>
                                    <br>
                                    <p class="email"> {{ Auth::user()->email }}</p>
                                    </div>
                                </li>
                                <li>

                                   
                                        <a  href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();" class="logout">
                                       
                                     
                                        <i class="fas fa-sign-out-alt"></i> 
                                        Salir
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    
                                </li>
                            </ul>
                        </div>
                           <!-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  / {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        
                                    </form>
                                </div>
                            </li> -->
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        
            @yield('content')
       

    </div>
</body>
</html>
