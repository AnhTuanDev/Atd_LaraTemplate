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
        <div class="w-full md:w-1/2 rounded-md">
        </div>
        <!-- Cart action -->
        <div class="w-full md:w-1/2 rounded-md">
            <!-- Cart list -->
            @if($cartCount && $cartContent)
                <div class="text-primary-text p-4 drop-shadow-lg rounded-t-md border-2 border-b-0 border-primary-dark p-5">
                    <!-- cart list -->
                    @foreach($cartContent as $key => $item) 
                    <div class="relative px-2 py-4 border-b border-dashed border-gray-300 text-primary-text flex flex-col">
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
                                <div class="flex items-center mt-4 -ml-2 text-sm">
                                    <div for="color" class="ml-1 md:ml-2 w-5 h-5 bg-{{$item->options->color}} rounded-full"></div>
                                    <div for="price" class="p-1 md:p-2 leading-none md:border-r md:border-gray-400"> Giá: {{ $item->price }} K</div>
                                    <div for="opti"  class="p-1 md:p-2 flex items-center leading-none md:border-r md:border-gray-400">{{ $item->options->has('size') ? $item->options->size : '' }}</div>
                                    <!-- Input quantity -->
                                    <div class="flex items-center mt-3 md:mt-0 md:ml-3">
                                        <div
                                            class="px-4 py-3 ml-1 leading-none 
                                            text-sm border border-primary-main 
                                            rounded-md duration-150 
                                            ">{{ $item->qty}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
            <!-- End cart list -->
            @if($cartCount)
                <div class="rounded-b-md w-full border-primary-dark mt-4 md:mt-0 p-4 border-2 border">
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
                    <div class="w-full mt-6">
                    <!-- Cart ghi chu -->
                        <div class="flex items-center mb-3 text-md leading-none text-gray-500">
                            <x-orchid-icon path="note" />
                            <label for="note" class="ml-2 capitalize">Ghi chú</label>
                        </div>
                        {{ $cartNote }}
                    </div>
                </div>
                <!-- Thanh toan -->
                <div class="w-full mt-4 flex items-center">
                    <a href="/" 
                        class="w-full bg-secondary-main uppercase text-center
                        border border-secondary-main hover:bg-secondary-dark
                        text-secondary-text font-semibold duration-150
                        px-4 py-2 rounded-md text-md md:text-md "
                        >Hoàn Tất Đơn Hàng
                    </a>
                </div>
            @endif
        </div>
    </div>
    {{-- Ende   Cart Content --}}

</section>
