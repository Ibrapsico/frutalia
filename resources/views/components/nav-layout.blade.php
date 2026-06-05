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


            {{-- Iconos de carrito y wishlist (siempre visibles) --}}
            <a class="nav__icon" href="{{ route('home') }}" aria-label="Carrito de compras">
                <svg class="nav__icon-svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                <span class="nav__icon-badge">0</span>
            </a>

            <a class="nav__icon" href="{{ route('home') }}" aria-label="Lista de deseos">
                <svg class="nav__icon-svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                </svg>
                <span class="nav__icon-badge">0</span>
            </a>
        </div>
    </nav>
</div>