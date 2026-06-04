<x-base-layout>
    <div class="container">
        <x-slot:h1>Nueva Contraseña</x-slot:h1>
        
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            
            <div>
                <label>Email:</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>
            
            <div>
                <label>Nueva contraseña:</label>
                <input type="password" name="password" required>
                @error('password') <div class="error">{{ $message }}</div> @enderror
            </div>
            
            <div>
                <label>Confirmar contraseña:</label>
                <input type="password" name="password_confirmation" required>
            </div>
            
            <button type="submit">Restablecer contraseña</button>
        </form>
    </div>    
</x-base-layout>


