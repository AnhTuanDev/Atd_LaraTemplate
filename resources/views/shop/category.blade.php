<x-shop.layouts.app>

    <div class="content">

        <div class="max-w-7xl mx-auto">

            <div class="px-5">
                <livewire:partials.breadcrumbs
                     shop="shop"
                    :category="$category" 
                    />
            </div>

            <livewire:shop.product-list :category="$category" commandBar="true" isSlideBar="true"/>
        
        </div>
    </div>

    <!-- Clients -->
    <x-shop.partials.clients />

</x-shop.layouts.app>
