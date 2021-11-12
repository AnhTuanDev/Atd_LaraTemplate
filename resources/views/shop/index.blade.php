<x-shop.layouts.app>

    <x-slot name="header">
        <x-shop.partials.header />
    </x-slot>

    <!-- Home Top panner -->
    <x-shop.partials.home-banner-top />

    <div class="content">
        <div class="max-w-7xl mx-auto">

            <x-shop.partials.latest-product title="Sản phẩm mới" />

            <x-shop.partials.latest-product title="Sản phẩm nổi bật" />

            <!-- Home middle panner -->
            <x-shop.partials.home-banner-middle />

            <x-shop.partials.latest-product title="Đang giảm giá" />

            <x-shop.partials.latest-post class="bt-0 md:bt-0"/>
        
        </div>
    </div>

    <!-- Clients -->
    <x-shop.partials.clients />

</x-shop.layouts.app>
