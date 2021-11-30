<div class="flex flex-col mb-5 md:mb-8 overflow-hidden cursor-pointer p-2">

    <a href="{{ route('shop.product.show', $product) }}">
        <div class="flex-shrink-0 rounded-lg shadow-md group
                    border-2 border-primary-light 
                    hover:border-secondary-light
                    hover:ring-2
                    hover:ring-secondary-light 
                    hover:ring-opacity-50 
                    hover:shadow-lg 
                    hover:ring-offset-4 
                    duration-200 ease-in-out">

                    <img class="object-cover w-full h-72 xl:h-96 rounded-md group-hover:opacity-70 duration-200 ease-in" 
                         src="{{ $product->cover ? $product->cover->url() : '/' }}" alt="{{ $product->name}}">
        </div>
    </a>

    <div class="flex flex-col justify-between flex-1">
        <a href="/blog-post"> </a>
        <div class="flex-1">
            <a href="{{ route( 'shop.category', $product->category ) }}">
                <div class="flex pt-6 text-sm font-medium text-secondary-main hover:font-bold duration-100">
                    <span>{{ $product->category->name ?? '' }} </span>
                </div>
            </a>
            <a href="{{ route('shop.product.show', $product) }}" class="block mt-2 space-y-6">
                <h3 class="capitalize
                   text-xl font-semibold leading-none
                   tracking-tighter text-primary-text
                   hover:text-secondary-main
                   duration-150">{{ $product->name }}
                </h3>
            </a>

        </div>

        <div class="inline-flex items-center justify-between rounded-full shadow mt-6 p-1">
            @if($product->discount < 1)
                <bottom class="rounded-full bg-primary-main text-primary-text px-4 md:px-6 py-1 text-sm font-bold">{{ $product->price }}</bottom>
            @else
                <bottom class="rounded-full bg-primary-main text-primary-text px-4 md:px-6 py-1 text-sm font-bold">{{ $product->discount }}</bottom>
                <bottom class="rounded-full px-4 md:px-6 py-1 line-through text-sm text-primary-dark">{{ $product->price}}</bottom>
            @endif
        </div>

    </div>
</div>
