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

    {{-- Cart Content --}}
    <div class="w-full max-w-7xl mx-auto p-5 md:flex md:space-x-5">
        <!-- Cart list -->
        <div class="w-full md:w-1/2 rounded-md">
            <div class="text-primary-text p-4 drop-shadow-lg rounded-md border-2 border-primary-dark p-5">
                @if($cartContent)
                @foreach($cartContent as $key => $item) 
                    <!-- Cart content -->
                    <div class="relative px-2 py-4 border-b border-dashed border-gray-300 text-primary-text flex flex-col">
                        <div class="w-full flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="{{ $item->options->has('img') ? $item->options->img : '' }}" alt=""
                                    class="w-16 rounded-md drop-shadow-md object-container object-center mr-2
                                ">
                                <div> @php $pro = App\Models\Shop\Product::findOrFail($item->id); @endphp
                                    <a href="{{ route('shop.product.show', $pro) }}">
                                        <h3 
                                            class="text-md 
                                            hover:text-secondary-dark text-primary-text
                                            duration-150 font-medium 
                                            leading-none uppercase
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

                @if($cartCount)
                    <div class="w-full flex items-center mt-4">
                        <a href="{{ route('shop.cart.checkout') }}" class="w-full">
                            <button 
                                class="bg-primary-light w-full 
                                border border-primary-main hover:bg-primary-main
                                px-4 py-2 rounded-md text-sm md:text-md 
                                md:font-semibold duration-150"
                                >Cập Nhật
                            </button>
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Cart action -->
        <div class="w-full md:w-1/2 rounded-md">
            @if($cartCount)
                <div class="rounded-md w-full border-primary-dark mt-4 md:mt-0 p-4 border-2 border">
                    {{ \Cart::subtotal() }}
                    <div class="w-full mt-6">
                        <textarea id="" name="note" rows="5"
                            placeholder="Ghi chú"
                            class="w-full rounded-md border border-primary-dark
                            placeholder:capitalize placeholder:text-lg placeholder:text-gray-700
                            focus:ring-secondary-dark focus:ring-2 text-md 
                            focus:outline-none placeholder:font-semibold
                            focus:border-transparent leading-none 
                            ">
                        </textarea>
                    </div>
                </div>
                <div class="w-full mt-4 flex items-center">
                    <button 
                        wire:click="destroyCart" 
                        class="w-full bg-secondary-main uppercase
                        border border-secondary-main hover:bg-secondary-dark
                        px-4 py-2 rounded-md text-md md:text-md 
                        font-semibold duration-150"
                        >Thanh Toán
                    </button>
                </div>
            @endif
            <!-- Tiếp tục mua hàng -->
            <div class="w-full max-w-7xl flex justify-center items-center mt-4">
                <a href="{{ route('shop.index') }}" class="w-full">
                    <button 
                        class="bg-primary-light w-full 
                        border border-primary-main hover:bg-primary-main
                        px-4 py-2 rounded-md text-sm md:text-md 
                        md:font-semibold duration-150"
                        >Tiếp Tục Mua Hàng
                    </button>
                </a>
            </div>
            <!-- End Tiếp tục mua hàng -->
        </div>
    </div>
    {{-- Ende   Cart Content --}}

</section>
