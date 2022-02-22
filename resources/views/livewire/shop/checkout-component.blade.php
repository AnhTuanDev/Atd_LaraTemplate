<section class="content">

    <section class="max-w-7xl mx-auto px-5">
        <livewire:partials.breadcrumbs
             shop="shop"
             {{-- :currentItemName="$product->name" 
             :category="$product->category" --}}
            />
    </section>

    <div class="w-full max-w-7xl mx-auto p-5 flex items-center justify-center">
        <!-- Header title Bar -->
        <h3 class="flex 
            items-center justify-center 
            text-secondary-main 
            text-lg md:text-2xl 
            font-semibold
            cursor-pointer
            uppercase
            "> Sản Phẩm Cùng Loại
        </h3>
    </div>

    <div class="w-full max-w-7xl mx-auto p-5 md:flex">
        <!-- Cart list -->
        <div class="w-full md:w-1/2">
            <div
                class="text-primary-text 
                p-4 drop-shadow-lg 
                ">
                @if($cartContent)
                    @foreach($cartContent as $key => $item) 
                        <div class="relative px-2 py-4 border-b border-dashed border-gray-300 text-primary-text flex flex-col">

                            <div class="w-full flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="{{ $item->options->has('img') ? $item->options->img : '' }}" alt=""
                                        class="w-16 rounded-md drop-shadow-md object-container object-center mr-2
                                    ">
                                    <div>
                                        @php 
                                            $pro = App\Models\Shop\Product::findOrFail($item->id);
                                        @endphp
                                        <a href="{{ route('shop.product.show', $pro) }}">
                                            <h3 
                                                class="text-md 
                                                hover:text-secondary-dark
                                                text-primary-text
                                                duration-150
                                                font-medium 
                                                leading-none 
                                                uppercase
                                                "> {{ $item->name }} 
                                            </h3>
                                        </a>
                                
                                        <div class="flex items-center mt-4 -ml-2 text-sm">
                                        
                                            <div for="color" class="w-5 h-5 bg-{{$item->options->color}} rounded-full ml-2"></div>
                                
                                            <label for="price" class="p-2 leading-none border-r border-gray-400"> Giá: {{ $item->price }} K</label>
                                
                                            <label for="qty" class="p-2 leading-none border-r border-gray-400"> Số lượng: {{ $item->qty }}</label>
                                        
                                            <label for="opti" class="flex items-center p-2 leading-none">{{ $item->options->has('size') ? $item->options->size : '' }}</label>
                                
                                        </div>
                                    </div>
                                </div>
                                <!-- Input quantity -->
                                <input 
                                    {{-- wire:model="quantity" --}}
                                    :value="{{ $item->qty }}"
                                    type="text" 
                                    class="border border-primary-main rounded-md focus:outline-none 
                                    focus:border-transparent focus:ring-2
                                    w-10 text-md leading-none inline-flex focus:ring-secondary-dark
                                    items-center text-center font-semibold
                                    ">
                                <!-- Button remove cart item -->
                                <button wire:click.prevent="cartRemove( '{{$item->rowId }}' )" 
                                     class="p-1 rounded-lg bg-secondary-dark hover:drop-shadow-md hover:bg-primary-dark duration-50 mt-2">
                                    <x-orchid-icon path="trash" class="text-sm font-bold text-secondary-text"/>
                                </button>
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

                <div class="w-full 
                    max-w-7xl mx-auto 
                    flex items-center 
                    justify-end
                    space-x-4
                    mt-4
                    ">
                    <a href="{{ route('shop.cart.checkout') }}">
                        <button 
                            class="bg-secondary-main 
                            border border-secondary-main
                            hover:bg-primary-main
                            px-4 py-2 rounded-md 
                            text-sm md:text-md 
                            md:font-semibold
                            duration-150"
                            >Update
                        </button>
                    </a>
                </div>

            </div>
        </div>
        <!-- Cart action -->
        <div 
            class="w-full 
            border-primary-dark
            md:w-1/2 p-4
            mt-4 p-4
            border-2
            border 
            ">
            @if($cartCount)
                {{ \Cart::subtotal() }}
                <div class="w-full 
                    max-w-7xl mx-auto 
                    flex items-center 
                    space-x-4 justify-between 
                    ">
                    <a href="{{ route('shop.cart.checkout') }}">
                        <button 
                            class="bg/checkout-secondary-main 
                            border border-secondary-main
                            hover:bg-primary-main
                            px-4 py-2 rounded-md 
                            text-sm md:text-md 
                            md:font-semibold
                            duration-150"
                            >Xem Giỏ Hàng
                        </button>
                    </a>
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
</section>
