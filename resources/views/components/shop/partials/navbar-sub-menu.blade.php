@props([ 'mainMenu' ])
<div class="hidden lg:ml-8 lg:block lg:self-stretch z-40">
    <div 
        class="h-full flex space-x-8">

        <div 
            class="flex flex items-center">

            <div class="relative -ml-8">
                <x-shop.partials.navbar-link label="Home" link="{{ route('shop.home') }}" />
            </div>
            <div @mouseover.enter="open = 'Shop'"
                class="relative -ml-8">
                <x-shop.partials.navbar-link label="Shop" link="{{ route('shop.category') }}" />
            </div>
            <div class="relative -ml-8">
                <x-shop.partials.navbar-link label="Blog" link="/blog" />
            </div>
            <div class="relative -ml-8">
                <x-shop.partials.navbar-link label="Giới thiệu" link="/about" />
            </div>
            <div class="relative -ml-8">
                <x-shop.partials.navbar-link label="Liên hệ" link="/contact" />
            </div>

            <div x-show="open === 'Shop'" 
                 @click.outside="open = false"
                 style="display: none"
                x-transition.enter.origin.top.opacity.duration.200ms
                x-transition.leave.origin.top.opacity.duration.100ms
                class="absolute z-10 top-full inset-x-0 text-sm text-primary-text">

                <div class="absolute inset-0 top-1/2" aria-hidden="true"></div>

                <div class="relative bg-primary-dark shadow-lg backdrop-filter backdrop-blur-lg">
                    <div class="max-w-7xl mx-auto px-6">
                        <div class="grid grid-cols-3 gap-y-10 gap-x-8 py-16">

                            <div class="row-start-1 col-span-3 grid grid-cols-6 gap-y-10 gap-x-8 px-8">

                                @foreach($mainMenu as $menu) 
                                    @if($menu->child->count())
                                        <div>
                                            <div class="text-lg uppercase font-semibold text-primary-text">
                                                <a href="{{ route( 'shop.category', $menu ) }}">
                                                    {{ $menu->name }}
                                                </a>
                                            </div>

                                            <ul role="list" aria-labelledby="Brands-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                @foreach( $menu->child as $subMenu ) 
                                                <li class="flex items-center">
                                                    <a href="{{ route( 'shop.category', $subMenu ) }}" 
                                                        class="capitalize leading-none tracking-wider text-lg font-medium duration-150 hover:font-bold hover:text-secondary-main">
                                                        {{ $subMenu->name }}
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>

                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
