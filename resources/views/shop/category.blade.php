<x-shop.layouts.app>

    <div class="content">

        <div class="max-w-7xl mx-auto">

            <livewire:partials.breadcrumbs
                 shop="shop"
                :category="$category" 
                />

            <livewire:shop.product-list :category="$category" />
        
        </div>
    </div>

    <!-- Clients -->
    <x-shop.partials.clients />

</x-shop.layouts.app>
