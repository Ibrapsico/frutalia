
<x-base-layout>

    <div class="container">
        <x-slot:h1>Registro de Usuario</x-slot:h1>
        
        <!-- - Dejaremos el formulario en "novalidate" para probar las validatciones del backend: -->
        <form method="POST" action="{{ route('register') }}" novalidate>
            @csrf
            
            <div>
                <label>Nombre completo:</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
                @error('name') <div class="error">{{ $message }}</div> @enderror
            </div>
            
            <div>
                <label>Email:</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>
            
            <div>
                <label>Teléfono (opcional):</label>
                <input type="text" name="phone" value="{{ old('phone') }}">
                @error('phone') <div class="error">{{ $message }}</div> @enderror
            </div>
            
            <div>
                <label>Dirección (opcional):</label>
                <textarea name="address">{{ old('address') }}</textarea>
                @error('address') <div class="error">{{ $message }}</div> @enderror
            </div>
            
            <div>
                <label>Contraseña:</label>
                <input type="password" name="password" required>
                @error('password') <div class="error">{{ $message }}</div> @enderror
            </div>
            
            <div>
                <label>Confirmar contraseña:</label>
                <input type="password" name="password_confirmation" required>
            </div>
            
            <button type="submit">Registrarse</button>
        </form>
        
        <p>¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a></p>
    </div>


</x-base-layout>



