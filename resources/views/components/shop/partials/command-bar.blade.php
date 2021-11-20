
@props(['title' => 'title'])
<div class="relative z-10 flex items-baseline justify-between border-b border-primary-dark">

    <h1 class="text-4xl font-extrabold tracking-tight text-gray-900">{{ $title }}</h1>

    <div class="flex items-center">
        <div x-data="{ open: false }"
            @keydown.escape.stop="open = false" 
            @click.away="open = !open" 
            class="relative inline-block text-left">
            <div>
                <button 
                    type="button" 
                    class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                    aria-expanded="false">
                    Sort
                    <x-icons.chevron-down-rotation />
                </button>
            </div>


            <div x-show="open" 
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75" 
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-2xl bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1"
                @keydown.tab="open = false"
                @keydown.enter.prevent="open = false"
                @keyup.space.prevent="open = false" 
                style="display: none;">
                <div class="py-1" role="none">

                    <a href="#" class="font-medium text-gray-900 block px-4 py-2 text-sm" 
                        tabindex="-1" id="menu-item-0" @click="open = false">
                        Most Popular
                    </a>


                </div>
            </div>

        </div>

        <button type="button" class="p-2 -m-2 ml-5 sm:ml-7 text-gray-400 hover:text-gray-500">
            <span class="sr-only">View grid</span>
            <x-icons.view-grid />
        </button>
        <button type="button" class="p-2 -m-2 ml-4 sm:ml-6 text-gray-400 hover:text-gray-500 lg:hidden" @click="open = true">
            <span class="sr-only">Filters</span>
            <x-icons.filter />
        </button>
    </div>
</div>

