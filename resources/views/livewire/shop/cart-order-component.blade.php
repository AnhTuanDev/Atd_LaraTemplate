<section class="content">
    <section class="max-w-7xl mx-auto px-5">
        <livewire:partials.breadcrumbs shop="shop" />
    </section>
    <div class="w-full max-w-7xl mx-auto p-5 flex items-center justify-center">
        <!-- Header title Bar -->
        <h3 class="flex items-center justify-center 
            text-secondary-main text-lg md:text-2xl 
            font-semibold cursor-pointer
            uppercase
            ">Giỏ Hàng Của Bạn
        </h3>
    </div>
    {{-- Cart Content --}}
    <div class="w-full max-w-7xl mx-auto p-5 md:flex md:space-x-5">
        <!-- Cart list -->
        <div class="w-full md:w-1/2 rounded-md">
            @if($cartCount && $cartContent)
                <div class="text-primary-text p-4 drop-shadow-lg rounded-md border-2 border-primary-dark p-5">
                    @foreach($cartContent as $key => $item) 
                        <!-- Cart content -->
                    <div>
                        <div class="relative px-2 py-4 border-b border-dashed border-gray-300 text-primary-text flex flex-col">
                            <div class="w-full flex items-center justify-between">
                                <div class="flex">
                                    <div class="mr-4">
                                        <img 
                                            src="{{ $item->options->has('img') ? $item->options->img : '' }}" alt=""
                                            class="w-14 md:w-16 rounded md:rounded-md object-container object-center
                                            ">
                                    </div>
                                    <div> @php $pro = App\Models\Shop\Product::findOrFail($item->id); @endphp
                                        <a href="{{ route('shop.product.show', $pro) }}">
                                            <h3 class="text-sm md:text-md 
                                                hover:text-secondary-dark text-primary-text
                                                duration-150 font-medium 
                                                leading-none uppercase
                                                "> {{ $item->name }} 
                                            </h3>
                                        </a>
                                        <div class="md:flex items-center mt-4 -ml-2 text-sm">
                                            <div class="ml-1 md:ml-2 w-5 h-5 bg-{{$item->options->color}} rounded-full"></div>
                                            <div class="p-1 md:p-2 leading-none md:border-r md:border-gray-400"> Giá: {{ $item->price }} K</div>
                                            <div class="p-1 md:p-2 flex items-center leading-none md:border-r md:border-gray-400">{{ $item->options->has('size') ? $item->options->size : '' }}</div>
                                            <!-- Input quantity -->
                                            <div class="flex items-center mt-3 md:mt-0 md:ml-3">
                                                <button wire:click="setQuantity('-', '{{ $item->rowId }}')"
                                                    class="px-4 py-3 leading-none text-sm border border-primary-main 
                                                    rounded-md duration-150 hover:bg-primary-main 
                                                    hover:drop-shadow-lg
                                                    "><x-orchid-icon path="arrow-down" />
                                                </button>
                                                <div
                                                    class="px-4 py-3 ml-1 leading-none text-sm border border-primary-main 
                                                    rounded-md duration-150 
                                                    ">{{ $item->qty}}
                                                </div>
                                                <button wire:click="setQuantity('+', '{{ $item->rowId }}')"
                                                    class="px-4 py-3 ml-1 leading-none text-sm border border-primary-main 
                                                    rounded-md duration-150 hover:bg-primary-main 
                                                    hover:drop-shadow-lg
                                                    "><x-orchid-icon path="arrow-up" />
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Button action -->
                                <div class="md:flex md:items-center md:space-x-4">
                                    <button wire:click.prevent="cartRemove('{{ $item->rowId }}')" 
                                        class="p-1 rounded-lg bg-gray-500 hover:bg-gray-700 duration-50 mt-2">
                                        <x-orchid-icon path="trash" class="text-sm font-bold text-secondary-text"/>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
            <!-- Chua co san pham -->
            @if(!$cartCount)
                <div class="p-2 flex justify-center items-center text gray-500 mt-4 rounded-md border">
                    <x-orchid-icon path="bell" />
                    <h3 class="text-sm ml-2"> Chưa có sản phẩm trong giỏ  </h3>
                </div>
            @endif
        </div>

        <!-- Cart action -->
        <div class="w-full md:w-1/2 rounded-md">
            @if($cartCount)
                <div class="rounded-md w-full border-primary-dark mt-4 md:mt-0 p-4 border-2 border">
                    <div class="flex items-center text-lg text-gray-700 font-semibold py-3 border-b border-gray-700 border-opacity-20">Trong giỏ hàng</div>
                    <!-- Tong don -->
                    <div class="flex items-center justify-between mt-4">
                        <label calss="text-md text-gray-700">
                            Tổng đơn:
                        </label>
                        <label class="text-2xl font-semibold text-primary-text">
                            {{ \Cart::subtotal() }} đ
                        </label>
                    </div>
                    <!-- Phi van chuyen -->
                    <div class="flex items-center justify-between mt-4">
                        <label calss="text-md text-gray-700">
                            Phí vận chuyển:
                        </label>
                        @if(\Cart::subtotal() >= '350.000')
                        <label class="text-sm text-primary-text">
                            Miễn phí
                        </label>
                        @else
                        <label class="text-sm text-primary-text">
                            Trillfa hỗ trợ 50% 
                        </label>
                        @endif
                    </div>
                    <!-- chinh sach van chuyen -->
                    <div class="flex items-center mt-4 text-gray-700">
                        <x-orchid-icon path="bell" />
                        <label class="ml-2 text-sm leading-none">
                            TPHCM free ship với đơn hàng trên 250.000 đ
                        </label>
                    </div>
                    <div class="flex items-center mt-4 text-gray-700">
                        <x-orchid-icon path="bell" />
                        <label class="ml-2 text-sm leading-none">
                            Ngoài TPHCM free ship với đơn hàng trên 400.000 đ
                        </label>
                    </div>
                    <div class="w-full mt-6">
                    <!-- Cart ghi chu -->
                        <div class="flex items-center mb-3 text-md leading-none text-gray-500">
                            <x-orchid-icon path="note" />
                            <label for="note" class="ml-2 capitalize">Ghi chú</label>
                        </div>
                        <textarea wire:model.defer="cartnote" rows="5"
                            class="w-full rounded-md border border-primary-dark
                            placeholder:capitalize placeholder:text-lg placeholder:text-gray-700
                            focus:ring-secondary-dark focus:ring-2 text-md 
                            focus:outline-none placeholder:font-semibold
                            focus:border-transparent leading-none 
                            ">
                        </textarea>
                    </div>
                </div>
                <!-- Thanh toan -->
                <div class="w-full mt-4 flex items-center">
                    <button wire:click="checkout()"
                        class="w-full bg-secondary-main uppercase text-center
                        border border-secondary-main hover:bg-secondary-dark
                        text-secondary-text font-semibold duration-150
                        px-4 py-2 rounded-md text-md md:text-md "
                        >Thanh Toán
                    </button>
                </div>
            @endif
            <!-- Tiếp tục mua hàng -->
            <div class="w-full max-w-7xl flex justify-center items-center mt-4">
                <a href="{{ route('shop.index') }}" 
                    class="bg-primary-light w-full flex justify-center items-center
                    border border-primary-main hover:bg-primary-main
                    px-4 py-2 rounded-md text-sm md:text-md 
                    md:font-semibold duration-150
                    ">
                    <x-orchid-icon path="action-undo" />
                    <button class="ml-2">Tiếp Tục Mua Hàng </button>
                </a>
            </div>
            <!-- End Tiếp tục mua hàng -->
        </div>
    </div>
    {{-- Ende   Cart Content --}}

</section>
