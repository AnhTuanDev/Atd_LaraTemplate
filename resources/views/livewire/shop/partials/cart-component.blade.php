<div x-data
    class="flex items-center justify-center">
    @if($cartCount)
        <button @click="$store.shop.toggleOverflow(); $store.shop.toggleSlideCart()"
                class="relative flex items-center 
                text-md leading-none font-semibold z-[9998]
                "> 
                <x-orchid-icon path="bag" class="text-lg font-bold text-secondary-main"/>
                <div for="cart" 
                    class="bg-secondary-light ml-1 rounded-full font-bold 
                    hover:bg-secondary-dark hover:text-secondary-text
                    leading-none text-sm p-2 flex flex-col items-center 
                    text-center duration-150
                    "> {{ $cartCount }}
                </div>
        </button>
    @endif
    <div x-show="$store.shop.slideCart"
        x-transition:enter.origin.right.top.duration.200ms
        x-transition:leave.origin.right.top.duration.150ms
        style="display: none"
        class="fixed w-screen md:w-96 h-screen z-[9999] bg-primary-dark 
        overflow-y-auto drop-shadow-md right-0 top-0 bg-opacity-[95%]
        backdrop-blur-lg border-l border-opacity-30
        border-gray-700 
        ">
        <div class="w-full flex items-center justify-between 
            p-4 border-b border-gray-700 border-opacity-20
            ">
            <h3 class="text-xl font-semibold text-primary-text leading-none">Giỏ Hàng</h3>
            <button @click="$store.shop.overflow = false; $store.shop.toggleSlideCart()">
                <x-orchid-icon path="close" class="text-2xl font-bold text-primary-text"/>
            </button>
        </div>

        <div x-data
            class="text-primary-text px-4 pt-4 pb-6 drop-shadow-lg 
            border-b border-gray-700 border-opacity-20
            ">
            @if($cartContent)
                @foreach($cartContent as $key => $item) 
                    <div 
                        class="relative border-dashed border-opacity-30
                        px-2 py-4 border-b border-gray-700
                        text-primary-text flex flex-col
                        @if($cartContent) translate-open 
                        @else translate-leave @endif
                        ">
                       <button wire:click.prevent="cartRemove( '{{$item->rowId }}' )" 
                            class="p-1 rounded-lg absolute 
                            top-0 right-0 z-[9999] hover:bg-secondary-main 
                            hover:drop-shadow-md bg-secondary-dark 
                            duration-50 mt-2
                            "><x-orchid-icon path="trash" class="text-sm font-bold text-secondary-text"/>
                       </button>
                        <div class="flex items-center">
                            <img src="{{ $item->options->has('img') ? $item->options->img : '' }}" alt=""
                                class="w-10 md:w-16 rounded-md drop-shadow-md object-container object-center mr-4">
                            <div>
                                <h3 class="text-sm md:text-md font-medium leading-none uppercase"> {{ $item->name }} </h3>
                                <div class="md:flex items-center mt-4 -ml-2 text-sm">
                                    <div   for="color" class="w-5 h-5 bg-{{$item->options->color}} rounded-full ml-2"></div>
                                    <div for="price" class="p-1 md:p-2 leading-none md:border-r md:border-gray-400"> Giá: {{ $item->price }} K</div>
                                    <div for="qty"   class="p-1 md:p-2 leading-none md:border-r md:border-gray-400"> Số lượng: {{ $item->qty }}</div>
                                    <div for="opti"  class="p-1 md:p-2 flex items-center leading-none">{{ $item->options->has('size') ? $item->options->size : '' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            @if(!$cartCount)
                <div class="flex items-center text gray-500">
                    <x-orchid-icon path="bell" />
                    <h3 class="w-full text-sm ml-2"> Chưa có sản phẩm trong giỏ  </h3>
                </div>
            @endif
            @if($cartCount)
                <div class="w-full flex items-center space-x-4 justify-between mt-6">
                    <a href="{{ route('shop.cart.order') }}">
                        <button @click="$store.shop.overflow = false"
                            class="bg-secondary-main 
                            border border-secondary-main hover:bg-primary-main
                            px-4 py-2 rounded-md text-sm md:text-md 
                            md:font-semibold duration-150"
                            >Xem Giỏ Hàng
                        </button>
                    </a>
                    <button 
                        @click="$store.shop.overflow = false"
                        wire:click="destroyCart" 
                        class="bg-primary-dark border 
                        border-secondary-main hover:bg-primary-main
                        px-4 py-2 rounded-md text-sm md:text-md 
                        font-semibold duration-150
                        ">Xóa Giỏ
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>
