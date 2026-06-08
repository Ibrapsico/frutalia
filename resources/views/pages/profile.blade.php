<x-base-layout>


<div class="form__container">
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')

        <h1 class="form__title">MIS DATOS</h1>

        <label class="form__label">Nombre</label>
        <input class="font-semibold" type="text" name="name" value="{{ $user->name }}">

        <label class="form__label">Email</label>
        <input type="email" name="email" value="{{ $user->email }}">

        <label class="form__label">Teléfono</label>
        <input type="text" name="phone" value="{{ $user->phone }}">

        <label class="form__label">Dirección</label>
        <input type="text" name="address" value="{{ $user->address }}">

        <label class="form__label">Nueva contraseña</label>
        <input type="password" name="password">

        <label class="form__label">Confirmar contraseña</label>
        <input type="password" name="password_confirmation">

        <button class="form__btn" type="submit">Guardar cambios</button>
    </form>    
</div>

</x-base-layout>