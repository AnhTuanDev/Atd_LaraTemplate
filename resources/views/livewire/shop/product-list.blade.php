<section>
    <div class="items-center w-full px-5 py-6 md:py-10 mx-auto md:px-6 xl:px-none max-w-7xl">

        <!-- Command Bar -->
        <x-shop.partials.command-bar :title="$title" :sortLabel="$sortLabel" :sortByData="$sortByData" :perPage="$perPage" :perPageData="$perPageData" />

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-x-6 gap-y-8">

            <!-- slide bar -->

            <x-shop.partials.slide-bar :parentCate="$parentCate" />

            <!-- product list -->
            <div class="relative lg:col-span-3">
                <div class="gap-x-6 gap-y-8 mt-8 md:mt-12 grid grid md:grid-cols-3">
                    @isset($products)
                        @foreach($products as $product)
                            <x-shop.partials.product-list-item :product="$product" />
                        @endforeach
                    @endif
            
                </div>
            </div>
            <!-- product list -->

        </div>

    </div>
{{ $products->links() }}
</section>

