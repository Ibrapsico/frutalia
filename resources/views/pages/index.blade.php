<x-base-layout>

    {{-- HERO FULL WIDTH --}}
    <section class="relative w-full h-[80vh] overflow-hidden">
        
        <img 
            src="{{ asset($imagen ?? 'images/hero.jpg') }}" 
            alt="Frutalia" 
            class="absolute inset-0 w-full h-full object-cover opacity-80"
        >

        <div class="absolute inset-0 bg-black/50"></div>

        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-4">
            
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4 text-terciario drop-shadow-lg">
                Bienvenidos a Frutalia
            </h1>

            <p class="text-lg md:text-2xl max-w-2xl mb-6 text-blanco drop-shadow-lg">
                El marketplace de frutas y verduras frescas de tu zona (km0)
            </p>

            @auth
                <p class="text-xl md:text-2xl opacity-90 text-blanco drop-shadow-lg">
                    ¡Hola, {{ auth()->user()->name }}!
                </p>
            @endauth

        </div>
    </section>
    <!-- <x-hero /> -->

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


        {{-- GRID DE PRODUCTOS --}}
<div class="max-w-7xl mx-auto grid gap-6 
            grid-cols-1 
            sm:grid-cols-2 
            lg:grid-cols-3 
            xl:grid-cols-4
            items-stretch">

            {{-- EJEMPLO (luego aquí haces @foreach($products as $product)) --}}
@for ($i = 0; $i < 8; $i++)
    <div class="card group bg-white rounded-xl overflow-hidden flex flex-col transition duration-300 hover:shadow-[0_10px_30px_rgba(47,111,62,0.8)]">
        
        {{-- Imagen ARRIBA --}}
        <a class="h-44 w-full overflow-hidden block" href="#">
            
            <img 
                src="{{ asset('images/products/1.jpg') }}" 
                alt="Producto"
                class="w-full h-full object-cover transition duration-500 ease-in-out group-hover:scale-110"
            >

        </a>    

        {{-- Contenido --}}
        <div class="p-3 flex flex-col gap-1">
            
            {{-- Título --}}
            <h3 class="mx-auto">
                <a href="#" class="text-base font-semibold text-primario hover:text-primario-suave transition text-lg">
                    Tomates ecológicos
                </a>
            </h3>

            {{-- Descripción --}}
            <p class="text-sm text-gris leading-snug line-clamp-3">
                Tomates cultivados de forma natural en huerto local, sin pesticidas.
            </p>

            {{-- Precio --}}
            <div class="mt-2 mx-auto">
                <span class="text-lg font-bold text-terciario">
                    3,50€ <span class="text-sm text-gris">(IVA incluido)</span>
                </span>
            </div>

        </div>
    </div>
@endfor

        </div>

    </section>

</x-base-layout>