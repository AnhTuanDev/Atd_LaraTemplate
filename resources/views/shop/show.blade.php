<x-shop.layouts.app>


    <!-- Show -->
    <x-slot name="header">
    </x-slot>

    <livewire:partials.breadcrumbs
         shop="shop"
        :currentItemName="$product->name" 
        :category="$product->category" 
        />

    <livewire:shop.show :product="$product"/>

</x-shop.layouts.app>
