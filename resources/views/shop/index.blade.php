<x-shop.layouts.app>

    <x-slot name="header">
        <x-shop.partials.header />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">

            <x-shop.partials.latest-product title="Sản phẩm mới" />
            <x-shop.partials.latest-product title="Sản phẩm nổi bật" />
            <x-shop.partials.latest-product title="Đang giảm giá" />
            <x-shop.partials.latest-post />
        
        </div>
    </div>

</x-shop.layouts.app>
