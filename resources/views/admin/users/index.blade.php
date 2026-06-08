<x-base-layout>
    <h1 class="text-center my-10">Usuarios</h1>
    <div class="flex justify-between items-center mb-4 mx-6">



            <!-- - Enlace Volver: -->
            <a href="{{ route('admin.panel') }}" 
                class="mx-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                ← Volver
            </a>

            <a href="{{ route('admin.users.create') }}"
            class="text-gray-50 bg-primario hover:bg-green-600 py-2 px-5 rounded">
                + Nuevo usuario
            </a>            

    </div>

    <table class="w-full border form__container">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">ID</th>
                <th class="border p-2">Nombre</th>
                <th class="border p-2">Rol</th>
                <th class="border p-2">Correo Electrónico</th>
                <th class="border p-2">Teléfono</th>
                <th class="border p-2">Dirección</th>
                <th class="border p-2">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
                <tr class="odd:bg-gray-700 even:bg-gray-500">
                    <td class="border p-2 text-gray-50">{{ $user->id }}</td>
                    <td class="border p-2 text-gray-50">{{ $user->name }}</td>
                    <td class="border p-2 text-gray-50">{{ $user->role }}</td>
                    <td class="border p-2 text-gray-50">{{ $user->email }}</td>
                    <td class="border p-2 text-gray-50">{{ $user->phone }}</td>
                    <td class="border p-2 text-gray-50">{{ $user->adress }}</td>

                    <td class="border p-2 flex gap-2 justify-center">
                        <a href="{{ route('admin.users.edit', $user) }}"
                            class="text-primario-suave font-bold hover:text-primario-claro">Editar</a>

                        <form action="{{ route('admin.users.destroy', $user) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="text-white-100 font-bold bg-red-400 hover:bg-red-800 "
                                    onclick="return confirm('¿Eliminar usuario?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </>
            @endforeach
        </tbody>
    </table>

        {{-- - Paginación: --}}
        <div class="mt-6 flex justify-center">{{ $users->links() }}</div>

</x-base-layout>