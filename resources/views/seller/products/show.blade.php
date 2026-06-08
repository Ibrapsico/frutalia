<x-base-layout>

    <div class="mx-auto my-15">
        <h1 class="text-center">{{ $product['name'] }}</h1>

        <img 
            src="{{ asset('images/products/1.jpg') }}" 
            alt="{{ $product['name'] }}"
            class="mx-auto w-100 h-100 object-cover rounded-2xl"
        >
        <div class="product__content w-2xl">
            <h3 class="mt-10">Descripción del producto:</h3>
            <p>{{ $product['description'] ?? "(Sin descripción disponible)" }}</p>
            
            <h3>Precio:</h3>
            <p>{{ $product['price'] }} €</p>
            
            <form action="{{ route('mantenimiento') }}">
                <button class="bg-primario">COMPRAR</button>
            </form>            
        </div>

        <div class="mt-8">
            <a href="{{ route('products') }}" 
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                ← Volver
            </a>
        </div>
    </div>

</x-base-layout>