<x-base-layout>

    <x-slot:title>Login Frutalia</x-slot:title>
    <x-slot:h1>Iniciar sesión:</x-slot:h1>

    <div class="container">

        
        @if (session('status')) 
            <div class="alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div>
                <label>Email:</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>
            
            <div>
                <label>Contraseña:</label>
                <input type="password" name="password" required>
                @error('password') <div class="error">{{ $message }}</div> @enderror
            </div>
            
            <button class="btn" type="submit">Entrar</button>
        </form>
        
        <p><a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a></p>
        <p>¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a></p>
    </div>    
</x-base-layout>


