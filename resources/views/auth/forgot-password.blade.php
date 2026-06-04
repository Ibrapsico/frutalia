

<x-base-layout>
    <div class="container">
        <x-slot:h1>Restablecer Contraseña</x-slot:h1>
        
        <!-- Si hay algo guardado en la sesión con la calve "status", lo sacamos: -->
        @if(session('status'))
            <div class="alert-success">{{ session('status') }}</div>
        @endif
        
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            
            <div>
                <label>Email:</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>
            
            <button type="submit">Enviar enlace de restablecimiento</button>
        </form>
        
        <p><a href="{{ route('login') }}">Volver al login</a></p>
    </div>    
</x-base-layout>


