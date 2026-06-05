

<x-base-layout>

        
        <!-- Si hay algo guardado en la sesión con la calve "status", lo sacamos: -->
        @if(session('status'))
            <div class="alert-success">{{ session('status') }}</div>
        @endif
        
        <form class="form__container form__container--compact" method="POST" action="{{ route('password.email') }}">
            @csrf
            <h1 class="form__title">Restablecer Contraseña</h1>

            <x-form.input label="Correo electrónico:" name="email" :required="true"  />

            
            <button class="form__btn" type="submit">Enviar enlace</button>
            {{-- - ACCESIBILIDAD (WCAG): --}}
            <p class="form__text">(Se te enviará un enlace al correo proporcionado para restablecer la contraseña)</p>
            <p><a class="form__link" href="{{ route('login') }}">Volver al login</a></p>
        </form>
        
        

</x-base-layout>


