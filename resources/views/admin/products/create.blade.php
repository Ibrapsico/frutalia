

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
        <a href="{{ route('admin.products.index') }}" 
            class="mx-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            ← Volver
        </a>
    </div>

    <form class="form__container" method="POST" action="{{ route('admin.products.store') }}">
        <h1>Crear producto</h1>
    
        @csrf

        <input type="text" name="name" placeholder="Nombre" class="border p-2 w-full mb-2">

        <textarea name="description" placeholder="Descripción" class="border p-2 w-full mb-2"></textarea>

        <input type="string" name="price" placeholder="Precio" class="border p-2 w-full mb-2">

        <input type="number" name="stock" placeholder="Stock" class="border p-2 w-full mb-2">

        <button class="bg-green-600 text-white px-4 py-2 hover:bg-green-400" >
            Crear
        </button>
    </form>

</x-base-layout>