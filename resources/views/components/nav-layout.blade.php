<div class="nav-container">
    <nav class="nav">
        {{-- ENLACES CENTRALES --}}
        <div class="nav__links">
            <a class="nav__link" href="{{ route('home') }}">Inicio</a>
            <a class="nav__link" href="{{ route('products.index') }}">Productos</a>
        </div>

        {{-- ZONA DE AUTENTICACIÓN (DERECHA) --}}
        <div class="nav__auth">
            @auth
                <a class="nav__link" href="#">Mi Perfil</a>
                
                @if(auth()->user()->hasRole('admin'))
                    <a class="nav__link" href="{{ route('home') }}">Panel Admin</a>
                @endif

                @if(auth()->user()->hasRole('seller'))
                    <a class="nav__link" href="{{ route('home') }}">Mis Productos</a>
                @endif

                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button class="nav__btn nav__btn--logout" type="submit">Cerrar Sesión</button>
                </form>
            @else
                <a class="nav__btn nav__btn--login" href="{{ route('login') }}">Iniciar Sesión</a>
            @endauth
        </div>
    </nav>
</div>