<x-base-layout>

    <h1 class="text-center my-10">Productos Vendedor</h1>
    <div class="flex justify-between items-center mb-4 mx-6">


                        {{-- - Condicional para ver si es admin o seller: --}}
                        @if(auth()->user()->hasRole('seller'))
                            <!-- - Enlace Volver: -->
                            <a href="{{ route('products') }}" 
                                class="mx-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                ← Volver
                            </a>

                            <a href="{{ route('seller.products.create') }}"
                            class="text-gray-50 bg-primario hover:bg-green-600 py-2 px-5 rounded">
                                + Nuevo producto
                            </a>       
                        
                        @elseif(auth()->user()->hasRole('admin'))
                            <!-- - Enlace Volver: -->
                            <a href="{{ route('admin.panel') }}" 
                                class="mx-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                ← Volver
                            </a>

                            <a href="{{ route('admin.products.create') }}"
                            class="text-gray-50 bg-primario hover:bg-green-600 py-2 px-5 rounded">
                                + Nuevo producto
                            </a>       
                        @endif


     

    </div>


    <table class="w-full border form__container">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">Nº</th>
                <th class="border p-2">Nombre</th>
                <th class="border p-2">Descripción</th>
                <th class="border p-2">Precio</th>
                <th class="border p-2">Stock</th>
                <th class="border p-2">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($products as $product)
                <tr class="odd:bg-gray-700 even:bg-gray-500">
                    <td class="border p-2 text-gray-50">{{ $loop->iteration }}</td>
                    <td class="border p-2 text-gray-50">{{ $product->name }}</td>
                    <td class="border p-2 text-gray-50">{{ $product->description }}</td>
                    <td class="border p-2 text-gray-50">{{ $product->price }}€</td>
                    <td class="border p-2 text-gray-50">{{ $product->stock }}</td>

                    <td class="border p-2 flex gap-2 justify-center">

                        {{-- - Condicional para ver si es admin o seller: --}}
                        @if(auth()->user()->hasRole('seller'))
                            <a href="{{ route('seller.products.edit', $product) }}"
                                class="text-primario-suave font-bold hover:text-primario-claro">Editar</a>
                        
                        @elseif(auth()->user()->hasRole('admin'))
                            <a href="{{ route('admin.products.edit', $product) }}"
                                class="text-primario-suave font-bold hover:text-primario-claro">Editar</a>
                        @endif



                        @if(auth()->user()->hasRole('seller'))
                            <form action="{{ route('seller.products.destroy', $product) }}"
                                method="POST">
                        
                        @elseif(auth()->user()->hasRole('admin'))
                            <form action="{{ route('admin.products.destroy', $product) }}"
                                method="POST">
                        @endif

                            @csrf
                            @method('DELETE')

                            <button class="text-white-100 font-bold bg-red-400 hover:bg-red-800 "
                                    onclick="return confirm('¿Eliminar producto?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $products->links() }}
    </div>

</x-base-layout>