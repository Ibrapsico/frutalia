
<x-base-layout>
    <x-slot:title>Registro Frutalia</x-slot:title>
    <div class="form__wrapper">
        <!-- - Dejaremos el formulario en "novalidate" para probar las validatciones del backend: -->
        <form class="form__container form__container--wide" method="POST" action="{{ route('register') }}" novalidate>
            @csrf
            <h1 class="form__title">Registro de Usuario</h1>
            <x-form.input label="Nombre completo:" name="name" :required="true" />
            <x-form.input label="Correo electrónico:" name="email" :required="true" />
            <x-form.input label="Teléfono (opcional):" name="phone" :required="false" />
            <x-form.textarea label="Dirección (opcional):" name="address" :required="false" />
            <x-form.input label="Contraseña:" type="password" name="password" :required="true" />
            <x-form.input label="Confirmar contraseña:" type="password" name="password_confirmation" :required="true" />
            
            <button class="form__btn" type="submit">Registrarse</button>
            <p  class="form__text">¿Ya tienes cuenta? <a  class="form__link" href="{{ route('login') }}">Inicia sesión</a></p>
        </form>
    </div>


</x-base-layout>



