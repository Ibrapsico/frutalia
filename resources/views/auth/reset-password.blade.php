<x-base-layout>
    <div class="form__wrapper">

        <x-slot:title>Password Reset</x-slot:title>

        <form class="form__container form__container--compact" method="POST" action="{{ route('password.update') }}">
            @csrf

            <h1 class="form__title">Nueva Contraseña:</h1>
            <input type="hidden" name="token" value="{{ $token }}">
            

            <x-form.input label="Correo electrónico:" name="email" :required="true" />
            
            <x-form.input label="Nueva contraseña:" type="password" name="password" :required="true" />
            
            <x-form.input label="Confirmar contraseña:" type="password" name="password_confirmation" :required="true" />

            
            <button class="form__btn" type="submit">Restablecer contraseña</button>
        </form>
    </div>    
</x-base-layout>


