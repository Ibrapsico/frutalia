<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Frutalia' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{-- TOP-BAR --}}
    <x-top-bar-layout />
    
    {{-- HEADER --}}
    <x-header-layout />

    {{-- MAIN --}}
    <main class="main">
        
        {{-- Mensajes globales FUERA del container --}}
        @if(session('success'))
            <div class="alert alert-success text-center font-semibold px-10 mt-10 mx-auto">{{ session('success') }}</div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger text-center font-semibold px-10 mt-10 mx-auto">{{ session('error') }}</div>
        @endif

        {{-- CONTENIDO --}}
        {{ $slot }}

    </main>

    
    
    
    {{-- FOOTER --}}
    <x-footer-layout />
</body>
</html>