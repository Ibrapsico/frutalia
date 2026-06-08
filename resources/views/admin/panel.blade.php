<x-base-layout>

<div class="mx-auto my-10 text-center">

    <h1 class="my-5 text-2xl font-bold text-gray-800">PANEL DE ADMINISTRACIÓN</h1>

    <div class="mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Usuarios -->
        <a href="{{ route('admin.users.index') }}" class="group">
            <div class="bg-white p-6 rounded-xl shadow-md transition-all duration-300 
                        hover:shadow-xl hover:scale-105 hover:bg-blue-50">
                <h3 class="text-gray-600 font-medium mb-2">Usuarios</h3>
                <p class="text-4xl font-bold text-blue-600 transition-colors duration-300">
                    {{ $totalUsers }}
                </p>
            </div>
        </a>

        <!-- Productos -->
        <a href="{{ route('admin.products.index') }}" class="group">
            <div class="bg-white p-6 rounded-xl shadow-md transition-all duration-300 
                        hover:shadow-xl hover:scale-105 hover:bg-green-50">
                <h3 class="text-gray-600 font-medium mb-2">Productos</h3>
                <p class="text-4xl font-bold text-green-600 transition-colors duration-300">
                    {{ $totalProducts }}
                </p>
            </div>
        </a>

        <!-- Categorías -->
        <a href="{{ route('mantenimiento') }}" class="group">
            <div class="bg-white p-6 rounded-xl shadow-md transition-all duration-300 
                        hover:shadow-xl hover:scale-105 hover:bg-purple-50">
                <h3 class="text-gray-600 font-medium mb-2">Categorías</h3>
                <p class="text-4xl font-bold text-purple-600 transition-colors duration-300">
                    {{ $totalCategories }}
                </p>
            </div>
        </a>

        <!-- Zonas -->
        <a href="{{ route('mantenimiento') }}" class="group">
            <div class="bg-white p-6 rounded-xl shadow-md transition-all duration-300 
                        hover:shadow-xl hover:scale-105 hover:bg-orange-50">
                <h3 class="text-gray-600 font-medium mb-2">Zonas</h3>
                <p class="text-4xl font-bold text-orange-600 transition-colors duration-300">
                    {{ $totalZones }}
                </p>
            </div>
        </a>

    </div>

</div>

</x-base-layout>