<div class="top-bar">
    
    @auth
        
        <a class="top-bar__link" href="{{ route('profile.index') }}">¡Hola, {{ auth()->user()->name }}!</a>
    @else
    <a class="top-bar__link" href="{{ route('register') }}">¡Únete ya a la comunidad de Frutalia!</a>
    @endauth
</div>