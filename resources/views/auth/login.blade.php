<x-base-layout>

    <x-slot:title>Login Frutalia</x-slot:title>

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

        @if (session('status')) 
            <div class="alert-success">{{ session('status') }}</div>
        @endif

        <form class="form__container--compact"  method="POST" action="{{ route('login') }}">
            @csrf
            
            <h1 class="form__title">Iniciar sesión:</h1>
            <x-form.input label="Correo electrónico:" name="email" :required="true"  />
            <x-form.input label="Contraseña:" type="password" name="password" :required="true" />
            
            <button class="form__btn" type="submit">Entrar</button>
            <a class="form__btn-link" href="{{ route('register') }}">Registrarse</a>

            <p class="form__text"><a class="form__link" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a></p>   
        </form>        


        

        


</x-base-layout>


