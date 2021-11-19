<section>
    <div class="items-center w-full px-5 py-6 md:py-10 mx-auto md:px-6 xl:px-none max-w-7xl">

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
                            <svg class="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500" x-description="Heroicon name: solid/chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
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
                    <svg class="w-5 h-5" aria-hidden="true" x-description="Heroicon name: solid/view-grid" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                </button>
                <button type="button" class="p-2 -m-2 ml-4 sm:ml-6 text-gray-400 hover:text-gray-500 lg:hidden" @click="open = true">
                    <span class="sr-only">Filters</span>
                    <svg class="w-5 h-5" aria-hidden="true" x-description="Heroicon name: solid/filter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-x-6 gap-y-8">

            <!-- slide bar -->
            <div class="hidden lg:block">
                <h3 class="sr-only">Categories</h3>
                <ul class="text-sm font-medium text-gray-900 space-y-4 pb-6 border-b border-gray-200">
                    <li>Cat -1</li>
                    <li>Cat -1</li>
                    <li>Cat -1</li>
                    <li>Cat -1</li>
                </ul>
            </div>

            <!-- product list -->
            <div class="relative lg:col-span-3">
                <div class="gap-x-6 gap-y-8 mt-8 md:mt-12 grid grid md:grid-cols-3">
                    @isset($products)
                        @foreach($products as $product)
                        <div class="flex flex-col mb-5 md:mb-8 overflow-hidden cursor-pointer p-2">
            
                            <a href="/blog-post">
                                <div class="flex-shrink-0 rounded-lg p-1 shadow-md">
                                    <img class="object-cover w-full h-64 md:h-64 lg:h-72 rounded-lg" 
                                         src="{{ $product->cover ? $product->cover->url() : '/' }}" alt="{{ $product->name}}">
                                </div>
                            </a>
            
                            <div class="flex flex-col justify-between flex-1">
                                <a href="/blog-post"> </a>
                                <div class="flex-1">
                                    <a href="{{ route( 'shop.category', $product->category ) }}">
                                        <div class="flex pt-6 text-sm font-medium text-secondary-main">
                                            <span>{{ $product->category->name ?? '' }} </span>
                                        </div>
                                    </a>
                                    <a href="#" class="block mt-2 space-y-6">
                                        <h3 class="
                                           text-2xl font-semibold leading-none
                                           tracking-tighter text-secondary-dark">{{ $product->name }}
                                        </h3>
                                    </a>
            
                                </div>
            
                                <div class="inline-flex items-center justify-between rounded-full shadow mt-4 p-1">
                                    @if($product->discount < 1)
                                        <bottom class="rounded-full bg-primary-main text-primary-text px-4 md:px-6 py-1 text-sm font-bold">{{ $product->price }}</bottom>
                                    @else
                                        <bottom class="rounded-full bg-primary-main text-primary-text px-4 md:px-6 py-1 text-sm font-bold">{{ $product->discount }}</bottom>
                                        <bottom class="rounded-full px-4 md:px-6 py-1 line-through text-sm text-primary-dark">{{ $product->price}}</bottom>
                                    @endif
                                </div>
            
                            </div>
                        </div>
                        @endforeach
                    @endif
            
                </div>
            </div>
            <!-- product list -->

        </div>

    </div>
</section>
