<!-- use plugin require('@tailwindcss/aspect-ratio') -->
<div x-data="{open: false}" class="bg-white">

    <!-- Mobile menu -->
    <livewire:partials.slide-menu />
    <!-- Mobile menu -->

    <header class="relative bg-primary-main">

        <nav aria-label="Top" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="h-16 flex items-center">
                <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
                <button @click.prevent="$store.shop.toggleSlideMenu()"
                    type="button"
                    class="bg-primary-main p-2 rounded-md text-secondary-dark lg:hidden">
                    <span class="sr-only">Open menu</span>
                    <!-- Heroicon name: outline/menu -->
                    <x-icons.menu-alt />
                </button>

                <!-- Logo -->
                <div class="ml-4 flex lg:ml-0">
                    <a href="{{ route('shop.home') }}">
                        <span class="sr-only">Trillfa</span>
                        <img class="h-8 w-auto" src="{{ asset('trillfa/trillfa.png') }}" alt="">
                    </a>
                </div>

                <!-- Flyout menus -->
                <x-shop.partials.navbar-sub-menu :mainMenu="$mainMenu" />
                <!-- Flyout menus -->
                <x-shop.partials.navbar-right />

            </div>
        </nav>
    </header>
</div>

