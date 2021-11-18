<div class="ml-auto flex items-center">
    <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
        <a href="#" class="text-sm font-semibold text-gray-700 hover:text-gray-800">Sign in</a>
        <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
        <a href="#" class="text-sm font-semibold text-gray-700 hover:text-gray-800">Create account</a>
    </div>

    <div class="hidden lg:ml-8 lg:flex">
        <a href="#" class="text-gray-700 hover:text-gray-800 flex items-center">
            <img src="https://tailwindui.com/img/flags/flag-canada.svg" alt="" class="w-5 h-auto block flex-shrink-0">
            <span class="ml-3 block text-sm font-semibold">
                CAD
            </span>
            <span class="sr-only">, change currency</span>
        </a>
    </div>

    <!-- Search -->
    <livewire:partials.navbar-search />
    <!-- Cart -->
    <div class="ml-4 flow-root lg:ml-6">
        <a href="#" class="group -m-2 p-2 flex items-center">
            <!-- Heroicon name: outline/shopping-bag -->
            <svg class="flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <span class="ml-2 text-sm font-semibold text-gray-700 group-hover:text-gray-800">0</span>
            <span class="sr-only">items in cart, view bag</span>
        </a>
    </div>

</div>
