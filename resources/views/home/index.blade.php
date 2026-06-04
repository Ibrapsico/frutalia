

<x-base-layout>
    <x-slot:h1>
        Bienvenido a Frutalia
    </x-slot:h1>


    <p>El marketplace de frutas y verduras frescas</p>
    
    @auth
        <p>¡Hola, {{ auth()->user()->name }}!</p>
    @endauth
</x-base-layout>




