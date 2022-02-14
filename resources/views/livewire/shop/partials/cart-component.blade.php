<div x-data
    class="flex items-center justify-center">
    <button @click="$store.shop.overflow = true, $store.shop.toggleSlideCart()"
            {{-- @mouseover.enter="open = 'Shop'" --}}
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

    <div x-show="$store.shop.slideCart"
        x-transition:enter.origin.right.top.duration.200ms
        x-transition:leave.origin.right.top.duration.150ms
        style="display: none"
        class="fixed right-0 top-0 w-screen md:w-96 h-screen z-[9999] bg-primary-dark drop-shadow-lg overflow-y-auto">

        <div class="w-full flex items-center justify-between p-6 border-b border-gray-300">
            <h3 class="text-xl font-semibold text-primary-text leading-none">Giỏ Hàng</h3>
            <x-orchid-icon path="close" class="text-2xl font-bold text-primary-text"/>
        </div>

        <div x-data
            @click.outside="$store.shop.overflow = false, $store.shop.toggleSlideCart()"
            class="text-primary-text p-4 drop-shadow-lg border-b">
            @if($cartContent)
                @foreach($cartContent as $key => $item) 
                    <div class="relative px-2 py-4 border-b border-dashed border-gray-300 text-primary-text flex flex-col">

                       <button wire:click.prevent="cartRemove( '{{$item->rowId }}' )" 
                            class="p-1 rounded-lg absolute top-0 right-0 z-[9999] bg-secondary-dark hover:drop-shadow-md hover:p-2 duration-50 mt-2">
                           <x-orchid-icon path="trash" class="text-sm font-bold text-secondary-text"/>
                       </button>

                        <div class="flex items-center">
                            <img src="{{ $item->options->has('img') ? $item->options->img : '' }}" alt=""
                                class="w-16 rounded-md drop-shadow-md object-container object-center mr-2">
                            <div>
                                <h3 class="text-md font-medium leading-none uppercase"> {{ $item->name }} </h3>

                                <div class="flex items-center mt-4 -ml-2 text-sm">
                                
                                    <div for="color" class="w-5 h-5 bg-{{$item->options->color}} rounded-full ml-2"></div>

                                    <label for="price" class="p-2 leading-none border-r border-gray-400"> Giá: {{ $item->price }} K</label>

                                    <label for="qty" class="p-2 leading-none border-r border-gray-400"> Số lượng: {{ $item->qty }}</label>
                                
                                    <label for="opti" class="flex items-center p-2 leading-none">{{ $item->options->has('size') ? $item->options->size : '' }}</label>
                                
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            @endif
            @if($cartContent)
            <div class="w-full flex items-center space-x-4 justify-between mt-4">
                <button 
                    class="bg-secondary-main 
                    border border-secondary-main
                    hover:bg-primary-main
                    px-4 py-2 rounded-md 
                    text-sm md:text-md 
                    md:font-semibold
                    duration-150"
                    >Xem Giỏ Hàng
                </button>
                <button 
                    wire:click="destroyCart" 
                    class="bg-primary-dark
                    border border-secondary-main
                    hover:bg-primary-main
                    px-4 py-2 rounded-md 
                    text-sm md:text-md 
                    font-semibold
                    duration-150"
                    >Xóa Giỏ
                </button>
            </div>
            @endif

        </div>
    </div>
</div>
