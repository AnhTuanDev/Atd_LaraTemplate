<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <!-- Trix richtext -->
        @if(\Route::currentRouteName() == 'shop.cart.order')
            @trixassets
        @elseif(\Route::currentRouteName() == 'shop.cart.checkout')
            @trixassets
        @endif

    </head>

    <body x-data
        :class="$store.shop.overflow ? 'overflow-hidden' : ''"
        class="font-sans antialiased text-base">

        <div
            :class="$store.shop.overflow && 'mr-3'"
            class="relative min-h-screen bg-primary-light">
            
            <!-- Navbar menu -->

            <livewire:partials.navbar />

            @if(isset($slideMenu))
                {{ $slideMenu }}
            @endif

            <!-- Page Heading -->
            @if(isset($header))
                {{ $header }}
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- Footer -->

        </div>

        <x-shop.partials.footer />

        @livewireScripts

    </body>
</html>
