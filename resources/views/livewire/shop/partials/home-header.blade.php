@if(!empty($productHeader))
<section class="relative bg-primary-main">
    <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 md:px-6 xl-px-none lg:py-24">

        <div class="block md:flex items-center">

            <div class="flex flex-col items-start mb-4 md:mb-10 lg:mb-16 text-left lg:flex-grow lg:pr-24 md:mb-0">
                @if($productHeader->discount < 0)
                    <span class="mb-4 md:mb-8 text-xl font-bold tracking-widest text-secondary-main uppercase">
                       Nổi Bật 
                    </span>
                @else
                    <span class="mb-4 md:mb-8 text-xl font-bold tracking-widest text-secondary-main uppercase">
                        Đang Giảm Giá
                    </span>
                @endif
                <a href="{{ route('shop.product.show', $productHeader) }}">
                    <h1 class="mb-8 text-xl md:text-3xl lg:text-4xl font-bold leading-none tracking-tighter text-primary-tex hover:text-secondary-dark duration-150 ease-out md:text-7xl lg:text-5xl"> 
                        {{ $productHeader->name }}
                    </h1>
                </a>

                <div class="w-full flex items-center justify-between bg-secondary-light p-1 rounded-lg shadow-lg">
                    <div class="inline-flex-items-center px-3 py-2">
                        @if($productHeader->discount < 1)
                        <label for="discount" class="font-semibold text-lg mr-4 text-secondary-text">{{ $productHeader->price}} </label>
                        @else
                            <label for="discount" class="font-semibold text-lg mr-4 text-secondary-text">{{ $productHeader->discount}} </label>
                            <label for="price" class="line-through text-secondary-dark text-base">{{ $productHeader->price}} </label>
                        @endif
                    </div>
                    <label for="discount time"
                        class="py-2 px-6 font-medium text-lg bg-secondary-main text-secondary-text rounded-md">
                            Còn 5 Ngày
                    </label>
                </div>

                <div class="mt-4 lg:mt-6 flex items-center space-x-6">
                    <div class="rounded-lg">
                        <x-shop.partials.button-link-secondary label=" Mua ngay " link="{{ route('shop.home') }}" />
                    </div>
                    <div class="rounded-lg">
                        <x-shop.partials.button-link-primary label=" Shopping " link="{{ route('shop.home') }}" />
                    </div>
                </div>
            </div>

            <div class="w-full mt-4 md:mt-12 md:max-w-lg rounded-xl xl:mt-0">
                <div>
                    <div class="relative w-full max-w-lg">
                        <div class="absolute top-0 rounded-full bg-violet-300 -left-4 w-72 h-72 mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
                        <div class="absolute rounded-full bg-fuchsia-300 -bottom-24 right-20 w-72 h-72 mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000">
                        </div>
                        <div class="relative w-full">
                            <a href="{{ route('shop.product.show', $productHeader) }}" 
                                class="w-full flex flex-col 
                                    md:flex-row 
                                    md:justify-end 
                                    group bg-primary-main">
                                    <img class="h-128 object-cover object-center 
                                         rounded-md
                                         shadow-md p-1
                                         duration-200 
                                         group-hover:transform 
                                         group-hover:scale-105 
                                         origin-bottom-right"
                                         alt="{{$productHeader->slug}}"
                                         src="{{ $productHeader->cover->url() }}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endif
