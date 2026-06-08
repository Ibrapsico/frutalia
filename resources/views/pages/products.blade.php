<x-base-layout>

    {{-- PRODUCTOS --}}
    <section class="py-12 px-4 md:px-8">
        
        {{-- TÍTULO --}}
        <div class="max-w-7xl mx-auto mb-10 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-primario">
                Productos en venta
            </h2>
            <p class="mt-2 font-semibold">
                Descubre productos frescos de tu zona
            </p>
        </div>




        {{-- BUSCADOR --}}
        <div class="max-w-7xl mx-auto mb-8 flex justify-center">
            <form method="GET" action="{{ url()->current() }}" class="flex items-center gap-2">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Buscar productos..."
                    class="w-full md:w-96 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-primario"
                >

                <button
                    type="submit"
                    class="px-4 py-4 bg-primario hover:bg-primario-suave text-white rounded-lg"
                >
                    Buscar
                </button>

                @if(request('search'))
                    <a href="{{ url()->current() }}"
                    class="px-4 py-2 text-sm text-primario-claro hover:text-black rounded-lg">
                        Limpiar
                    </a>
                @endif

            </form>
        </div>




        {{-- GRID DE PRODUCTOS --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            {{-- EJEMPLO (luego aquí haces @foreach($products as $product)) --}}

            @foreach ($products as $product)
                <div class="card group w-full bg-white rounded-xl overflow-hidden flex flex-col h-full transition duration-100 hover:shadow-[0_10px_30px_rgba(47,111,62,0.8)]">
                    
                    {{-- Imagen ARRIBA --}}
                    <a class="h-44 w-full overflow-hidden block" href="{{ route('products.show', $product) }}">
                        
                        <img 
                            src="{{ asset('images/products/1.jpg') }}" 
                            alt="{{ $product->name }}"
                            class="w-full h-full object-cover transition duration-100 ease-in-out group-hover:scale-110"
                        >

                    </a>    

                    {{-- Contenido --}}
                    <div class="p-3 flex flex-col gap-1 flex-1">
                        
                        {{-- Título --}}
                        <h3 class="text-center w-full">
                            <a href="{{ route('products.show', $product) }}" class="text-base font-semibold text-primario hover:text-primario-suave transition text-lg">
                                {{ $product->name }}
                            </a>
                        </h3>

                        {{-- Descripción --}}
                        <p class="text-center text-sm text-gris leading-snug line-clamp-3 min-h-[3.5rem]">
                            {{ $product->description ?? 'Sin descripción disponible' }}
                        </p>

                        {{-- Precio --}}
                        <div class="mt-auto text-center w-full pt-2">
                            <span class="text-lg font-bold text-terciario">
                                {{ $product->price }}€
                                <span class="text-sm text-gris">(IVA incluido)</span>
                            </span>
                        </div>

                    </div>
                </div>
            @endforeach

            

        </div>

        {{-- - Paginación: --}}
        <div class="mt-6 flex justify-center">{{ $products->links() }}</div>
    </section>

</x-base-layout>