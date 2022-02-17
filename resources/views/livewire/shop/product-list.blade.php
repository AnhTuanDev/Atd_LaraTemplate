<section>
    <div x-data="{ priceBetween: null }" class="items-center w-full px-5 py-6 md:py-10 mx-auto md:px-6 xl:px-none max-w-7xl">

        <!-- Command Bar -->
        @if($commandBar)
        <x-shop.partials.command-bar
            :title="$title" 
            :sortLabel="$sortLabel" 
            :sortByData="$sortByData" 
            :perPage="$perPage" 
            :perPageData="$perPageData" 
            :orderColumnLabel="$orderColumnLabel"
            :orderColumnData="$orderColumnData"
            />
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-x-6 gap-y-8">

            <!-- slide bar -->
            <x-shop.partials.slide-bar 
                :priceData="$priceData"
                :parentCate="$parentCate" 
                />

            <!-- product list -->
            <div class="relative lg:col-span-3">
                <div class="gap-x-6 gap-y-8 mt-8 md:mt-12 grid grid md:grid-cols-3">
                    @isset($products)
                        @foreach($products as $product)
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

