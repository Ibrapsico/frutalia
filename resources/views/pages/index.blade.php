<x-base-layout>

    {{-- HERO FULL WIDTH --}}
    <section class="relative w-full h-[80vh] overflow-hidden">
        
        <img
            src="{{ $images['hero'] ?? asset('images/logoFrutalia.png') }}" 
            alt="Frutalia" 
            class="absolute inset-0 w-full h-full object-cover opacity-80"
        >

        <div class="absolute inset-0 bg-black/50"></div>

        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-4">
            
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4 text-terciario drop-shadow-lg">
                Bienvenidos a Frutalia
            </h1>

            <p class="text-lg md:text-2xl max-w-2xl mb-6 text-terciario font-semibold drop-shadow-lg">
                El marketplace de frutas y verduras frescas de tu zona
            </p>

        </div>
    </section>

    <section class="max-w-2xl mx-auto px-2 py-10 font-semibold text-lg text-justify" >
        <h2 class="text-primario">De la huerta a tu casa en tan solo un clic.</h2>
        
        <p><span class="font-bold text-primario">Frutalia</span> es una plataforma de compra-venta de productos locales donde productores y particulares pueden ofrecer lo que cultivan o elaboran en su propia zona: huertos urbanos, macetas, pequeños terrenos o producción artesanal de proximidad.</p>
        
        <div class="grid grid-cols-2 gap-4 my-6">

            <img 
                src="{{ $images['apoyo01'] ?? asset('images/logoFrutalia.png') }}" 
                alt="Frutalia 1"
                class="w-full h-80 object-cover rounded-xl shadow-md transition-transform duration-300 hover:scale-[1.01] hover:shadow-xl"
            >  

            <img 
                src="{{ $images['apoyo05'] ?? asset('images/logoFrutalia.png') }}" 
                alt="Frutalia 2"
                class="w-full h-80 object-cover rounded-xl shadow-md transition-transform duration-300 hover:scale-[1.01] hover:shadow-xl"
            >

            <img 
                src="{{ $images['apoyo04'] ?? asset('images/logoFrutalia.png') }}" 
                alt="Frutalia 4"
                class="w-full h-80 object-cover rounded-xl shadow-md transition-transform duration-300 hover:scale-[1.01] hover:shadow-xl"
            >

            <img 
                src="{{ $images['apoyo02'] ?? asset('images/logoFrutalia.png') }}" 
                alt="Frutalia 3"
                class="w-full h-80 object-cover rounded-xl shadow-md transition-transform duration-300 hover:scale-[1.01] hover:shadow-xl"
            >               



        </div>
        
      

        <p>El objetivo es sencillo: reducir la distancia entre quien produce y quien consume, fomentando el comercio de <span class="font-bold text-primario">kilómetro cero</span>, actividad más sostenible, transparente y cercana, derivada de la localidad en la que vives.</p>
        <p>Este pequeño paso pretende alcanzar un objetivo más ambicioso: la creación de una <span class="font-bold text-primario">comunidad sostenible de mercado local</span>. Los compradores pueden explorar productos, contactar con vendedores, realizar compras y dejar valoraciones tanto del producto como del vendedor, generando la confianza necesaria dentro de esa comunidad.</p>


        <p>Las entregas se realizan de forma acordada en puntos de encuentro predefinidos, seleccionados desde un listado de ubicaciones seguras y convenientes para ambas partes.</p>
        
        <div class="flex justify-center my-8">
            <img 
                src="{{ $images['apoyo03'] ?? asset('images/logoFrutalia.png') }}" 
                alt="Frutalia apoyo 03"
                class="w-2/3 md:w-1/2 object-cover rounded-2xl shadow-xl transition-transform duration-300 hover:scale-101"
            >
        </div>
        
        <p>En definitiva, <a class="text-terciario hover:text-primario" href="{{ route('products') }}">Frutalia</a> no es solo una tienda online: es una red local que impulsa la economía de proximidad y el consumo responsable. ¡Anímate y súmate al cambio!</p>



    </section>


</x-base-layout>