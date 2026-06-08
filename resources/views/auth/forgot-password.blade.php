

<x-base-layout>

        
        <!-- Si hay algo guardado en la sesión con la calve "status", lo sacamos: -->
        @if(session('status'))
            <div class="alert-success">{{ session('status') }}</div>
        @endif
        
        @if ($errors->any())
            <div class="my-10 rounded bg-red-100 text-red-700 font-semibold p-3 mb-4 mx-auto">
                <h3>Error:</h3>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
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


