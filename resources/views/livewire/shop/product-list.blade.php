<section class="@isset($classes) {{ $classes }} @else px-5 @endif w-full mx-auto xl:px-none max-w-7xl">
    <div x-data="{ priceBetween: null }">

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

        <div class="@if($isSlideBar) grid grid-cols-1 lg:grid-cols-4 gap-x-6 gap-y-8 @els w-full @endif">

            @if($isSlideBar)
            <!-- slide bar -->
            <x-shop.partials.slide-bar 
                :priceData="$priceData"
                :parentCate="$parentCate" 
                />
            @endif

            <!-- product list -->
            <div class="relative @if($isSlideBar) lg:col-span-3 @else w-full @endif">
                @isset($headerTile)
                <div>
                    <!-- Header title Bar -->
                    <x-shop.partials.latest-header 
                        class="border-primary-main pb-3 mt-6 md:mt-14"
                        :title="$headerTile" 
                        titleClass="capitalize text-secondary-dark" />
                </div>
                @endif
                <div class="@if($headerTile) mt-4 @else mt-5 @endif gap-x-6 gap-y-8 grid grid
                    @if($isSlideBar) md:grid-cols-3 @else md:grid-cols-4 @endif">
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

