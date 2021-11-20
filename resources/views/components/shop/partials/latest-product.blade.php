@props([ 'products', 'title' => 'latest'])
<section>
    <div class="items-center w-full px-5 py-6 md:py-10 mx-auto md:px-6 xl:px-none max-w-7xl">

        <x-shop.partials.latest-header 
            class="border-primary-dark"
            :title="$title" 
            titleClass="capitalize text-secondary-dark" />

        <div class="relative">
            <div class="gap-x-6 gap-y-8 mt-8 md:mt-12 grid grid md:grid-cols-4">
                @isset($products)
                    @foreach($products as $product)
                        <x-shop.partials.product-list-item :product="$product" />
                    @endforeach
                @endif

            </div>
        </div>
    </div>
</section>

