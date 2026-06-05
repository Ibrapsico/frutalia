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