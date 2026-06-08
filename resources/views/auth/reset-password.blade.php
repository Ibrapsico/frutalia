<x-base-layout>
    <div class="form__wrapper">

        <x-slot:title>Password Reset</x-slot:title>

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


