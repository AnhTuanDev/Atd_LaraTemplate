<section class="px-5 w-full mx-auto xl:px-none max-w-7xl">
    <div>

        <div class="w-full">
            <!-- product list -->
            <div class="relative w-full">
                <div>
                    <!-- Header title Bar -->
                    <h3.partials.latest-header 
                        class="pb-3 mt-6 md:mt-14 justify-center">
                    </h3>
                </div>
                <div class="mt-5 gap-x-6 gap-y-8 grid grid
                    md:grid-cols-4"
                    >
                    @isset($products)
                        @foreach($products as $product)
                            @if()
                            <x-shop.partials.product-list-item :product="$product" />
                        @endforeach
                    @endif
                </div>

                <div class="px-5 py-4">
                    {{ $products->links() }}
                </div>

            </div>
            <!-- product list -->

        </div>

    </div>
</section>

