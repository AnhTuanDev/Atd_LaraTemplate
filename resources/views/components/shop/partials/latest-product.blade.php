@props([ 'products', 'title' => 'latest'])
<section>
    <div class="items-center w-full px-5 py-6 md:py-10 mx-auto md:px-6 xl:px-none max-w-7xl">

        <x-shop.partials.latest-header 
            class="border-primary-dark"
            :title="$title" 
            titleClass="capitalize text-secondary-dark" />

        <div class="relative">
            <div class="grid max-w-lg gap-4 md:gap-8 mx-auto mt-8 md:mt-12 lg:grid-cols-3 xl:grid-cols-4 lg:max-w-none">
                @isset($products)
                    @foreach($products as $product)
                    <div class="flex flex-col mb-5 md:mb-8 overflow-hidden cursor-pointer p-2">

                        <a href="/blog-post">
                            <div class="flex-shrink-0 rounded-lg p-1 shadow-md">
                                <img class="object-cover w-full h-96 rounded-lg" 
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
                                       text-2xl
                                       font-semibold
                                       leading-none
                                       tracking-tighter
                                       text-secondary-dark
                                       ">
                                        {{ $product->name }}
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
    </div>
</section>

