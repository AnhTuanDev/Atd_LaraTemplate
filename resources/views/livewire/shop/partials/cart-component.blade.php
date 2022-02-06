<div x-data="{ open: false }"
    class="flex items-center justify-center">
    <button @click="open = !open" @mouseover.enter="open = 'Shop'"
        class="relative flex items-center text-md leading-none font-semibold z-[9998]">

        <x-orchid-icon path="bag" class="text-lg font-bold text-secondary-main"/>

        @if($cartCount > 0)
            <div for="cart" 
                class="bg-secondary-light ml-1 rounded-full font-bold hover:bg-secondary-dark hover:text-secondary-text
                leading-none text-sm p-2 flex flex-col items-center text-center duration-150">
                {{ $cartCount }}
            </div>
        @endif
    </button>

    <div x-show="open"
        style="display: none"
        class="fixed right-0 top-0 w-screen md:w-96 min-h-screen z-[9999] bg-primary-dark">

            <div class="w-full flex items-center justify-between p-6 border-b border-gray-300">
                <h3 class="text-xl font-semibold text-primary-text leading-none">Giỏ Hàng</h3>
                <x-orchid-icon path="close" class="text-2xl font-bold text-primary-text"/>
            </div>

            <div @click.outside="open = false"
                class="text-primary-text p-4 drop-shadow-lg border-b">
                @foreach($cartContent as $item) 
                   <div class="px-2 py-4 border-b border-dashed border-gray-300">
                       <h3> {{ $item->name }} </h3>
                        <label for="price" class="p-2 rounded-md bg-secondary-main"> {{ $item->price }}</label>
                        <label for="qty" class="p-2 rounded-md bg-secondary-main"> {{ $item->qty }}</label>
                        @foreach($item->options as $opti)
                            <label for=""> {{ $opti }} </label>
                        @endforeach
                   </div>
                @endforeach
            </div>
    </div>

</div>
