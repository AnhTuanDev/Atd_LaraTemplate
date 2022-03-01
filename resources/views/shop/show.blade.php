<x-shop.layouts.app>

    <livewire:partials.breadcrumbs
         shop="shop"
        :currentItemName="$product->name" 
        :category="$product->category" 
        />

    <livewire:shop.show :product="$product"/>

</x-shop.layouts.app>
