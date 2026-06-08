<x-base-layout>


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

    <div class="flex justify-between items-center my-4 mx-6">
        <!-- - Enlace Volver: -->
        <a href="{{ route('admin.users.index') }}" 
            class="mx-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            ← Volver
        </a>
    </div>    

    <form class="form__container" method="POST" action="{{ route('admin.users.update', $user) }}">
        <h1>Editar usuario</h1>
    
        @csrf
        @method('PUT')

        <input type="text" name="name" placeholder="Nombre" class="border p-2 w-full mb-2" value="{{ $user->name }}">

        <select name="role" class="bg-gray-50 border p-2 w-full mb-2">
            <option value="">-- Selecciona rol --</option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}"
                    {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>

        <input type="text" name="email" placeholder="Correo electrónico" class="border p-2 w-full mb-2" value="{{ $user->email }}">

        <input type="text" name="phone" placeholder="Teléfono" class="border p-2 w-full mb-2" value="{{ $user->phone }}">

        <input type="text" name="address" placeholder="Dirección/Calle" class="border p-2 w-full mb-2" value="{{ $user->address }}">


        <!-- - contraseña: -->
        <label class="form__label">Nueva contraseña</label>
        <input type="password" name="password">

        <label class="form__label">Confirmar contraseña</label>
        <input type="password" name="password_confirmation">

        <button class="bg-green-600 text-white px-4 py-2 hover:bg-green-400" >
            Actualizar
        </button>
    </form>

</x-base-layout>