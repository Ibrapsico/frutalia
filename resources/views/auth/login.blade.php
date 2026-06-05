<x-base-layout>

    <x-slot:title>Login Frutalia</x-slot:title>



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


