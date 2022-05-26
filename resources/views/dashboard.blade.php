<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema Empleados</title>
    <link rel="stylesheet" href="{{ asset('/styles/dashboard.css')  }}">

    <script src="https://kit.fontawesome.com/79501d19d9.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <h1>Workers</h1>
        </div>
        <ul>
            <a href="{{ url('empleado/create' )}}" ><li> <i class="fas fa-user-plus"></i> Registrar empleados</li> </a>
            <a href="{{ url('empleado/' )}}" ><li><i class="fas fa-users"></i> Lista de empleados</li> </a>
            <li><div class="profile">
                <div class="top-profile">
                <img src="{{ asset('storage/uploads/RdNUSKEjZqGJCA90j4AbqKXkyopqrZnBkK4Zyk5s.png')}}">
                <h2 class="name">Pablo</h2>
                </div>
                <br>
                <p class="email">rgpablocr@gmail.com</p>
                </div>
            </li>
            <li>
                <div class="logout">
                    <i class="fas fa-sign-out-alt"></i> 
                    Salir
                </div>
            </li>
        </ul>
    </div>
    <div class="div content">
        @yield('content')
    </div>
</body>
</html>