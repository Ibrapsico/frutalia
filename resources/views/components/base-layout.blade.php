<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- - Dejamos un título de documento por defecto por si no se pone nada: -->
    <title>{{ $title ?? 'Frutalia' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">Inicio</a>
        <a href="{{ route('products.index') }}">Productos</a>
        
        @auth
            <a href="#">Mi Perfil</a>
            <a href="#">Mis Productos</a>
            
            @if(auth()->user()->is_admin)
                <a href="{{ route('admin.dashboard') }}">Panel Admin</a>
            @endif
            
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button class="btn" type="submit">Cerrar Sesión</button>
            </form>
        @else
            <a href="{{ route('login') }}">Iniciar Sesión</a>
            <a href="{{ route('register') }}">Registrarse</a>
        @endauth
    </nav>


    <header>
        <h1>{{ $h1 ?? "Frutalia" }}</h1>
    </header>
    
    
    <main>
        <!-- - Mensaje para nuevo inicio de sesión: -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <!-- - Mensaje para error de inicio de sesión: -->
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{ $slot }}
    </main>

</body>
</html>
