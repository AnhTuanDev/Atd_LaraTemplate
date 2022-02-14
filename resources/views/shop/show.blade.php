<x-shop.layouts.app>


    <!-- Show -->
    <x-slot name="header">
    </x-slot>

    <livewire:partials.breadcrumbs
        :breadcrumbs="$product" 
        :productName="$product->name" 
        shop="shop"
        :category="$product->category" 
        />

    <livewire:shop.show :product="$product"/>

</x-shop.layouts.app>
