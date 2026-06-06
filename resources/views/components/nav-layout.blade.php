<div class="nav-container">
    <nav class="nav">
        {{-- ENLACES CENTRALES --}}
        <div class="nav__links">
            <a class="nav__link" href="{{ route('home') }}">Inicio</a>
            <a class="nav__link" href="{{ route('products') }}">Productos</a>
        </div>

        {{-- ZONA DE AUTENTICACIÓN (DERECHA) --}}
        <div class="nav__auth">

            @auth
                <div x-data="{ open: false }" class="nav__dropdown">

                    <!-- BOTÓN -->
                    <button 
                        @click="open = !open"
                        class="nav__dropdown-trigger"
                    >
                        <!-- ICONO USUARIO -->
                        <svg class="nav__dropdown-icon" xmlns="http://www.w3.org/2000/svg" 
                            width="20" height="20" viewBox="0 0 24 24" fill="none" 
                            stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21a8 8 0 1 0-16 0"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>

                        <!-- NOMBRE -->
                        <span>{{ auth()->user()->name }}</span>

                        <!-- TRIÁNGULO -->
                        <svg 
                            class="nav__dropdown-arrow"
                            :class="{ 'nav__dropdown-arrow--open': open }"
                            xmlns="http://www.w3.org/2000/svg" 
                            width="16" height="16" 
                            viewBox="0 0 24 24" 
                            fill="currentColor"
                        >
                            <path d="M7 10l5 5 5-5z"/>
                        </svg>
                    </button>

                    <!-- MENÚ -->
                    <div 
                        x-show="open"
                        @click.outside="open = false"
                        x-transition
                        class="nav__dropdown-menu"
                    >
                        <a class="nav__dropdown-item" href="{{ route('profile.index') }}">Mi Perfil</a>

                        @if(auth()->user()->hasRole('seller'))
                            <a class="nav__dropdown-item" href="{{ route('mantenimiento') }}">Mis Productos</a>
                            <a class="nav__dropdown-item" href="{{ route('mantenimiento') }}">Mi Panel</a>
                        @endif

                        @if(auth()->user()->hasRole('admin'))
                            <a class="nav__dropdown-item" href="{{ route('mantenimiento') }}">Mi Panel</a>
                            <a class="nav__dropdown-item nav__dropdown-item--admin" href="{{ route('home') }}">Panel Admin</a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="nav__dropdown-item nav__dropdown-item--logout" type="submit">
                                Cerrar Sesión
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                    <polyline points="16 17 21 12 16 7"/>
                                    <line x1="21" y1="12" x2="9" y2="12"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>


            @else
                <a class="nav__btn nav__btn--login" href="{{ route('login') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                        <polyline points="10 17 15 12 10 7"/>
                        <line x1="15" y1="12" x2="3" y2="12"/>
                    </svg>Iniciar Sesión</a>
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