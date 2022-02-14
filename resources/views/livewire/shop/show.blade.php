<div class="content px-5">

    <div class="max-w-7xl mx-auto">

        <div class="w-full md:grid md:grid-cols-12 md:gap-6 my-5 md:my-8">

            <div class="w-full md:col-span-7">

                <div x-data="{ show: 0 }"
                    class="flex flex-col md:flex-row w-full">
                    <!-- Danh sach image --> 
                    <div class="flex order-last 
                        overflow-auto
                        md:order-first 
                        mt-2 md:mt-0
                        md:space-y-2
                        md:space-x-0
                        md:flex-col 
                        tems-center
                        rounded-md
                        md:h-screen
                        space-x-2
                        md:mr-2
                        "
                        >
                        @foreach($photos as $index => $img)
                        <img @click="show = {{ $index }}"
                            src="{{ $img->url() }}" alt=""
                            class="w-10 md:w-14 object-container object-center rounded" 
                            >
                        @endforeach
                    </div>

                    <!-- Acive image --> 
                    <div x-data="{ imgs: {{$photos}}, zoom: false }" class="w-full md:flex-1">
                        <template x-for="(img, key) in imgs" :key="img.id">
                            <div class="w-full overflow-auto">
                                <div @click="zoom = !zoom"
                                    x-show=" show  == key "
                                    :class="show === key ? 'translate-open' : 'translate-leave'"
                                    class="w-full">
                                    <img :src="img.url" alt=""
                                        @click.outside="zoom = false"
                                        :class="zoom ? 'scale-150' : ''" 
                                        class="w-full object-container object-center rounded" >
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

            </div>

            <!-- Product Detail -->
            <div class="w-full md:col-span-5">

                <h2 
                    class="text-2xl 
                    text-secondary-main 
                    border-primary-main
                    font-semibold 
                    pb-2 border-b
                    cursor-pointer
                    mt-6 md:mt-0
                    "
                    > {{$product->name}} 
                </h2>

                <div class="flex items-center space-x-2 mt-6">
                    <label for="sku" class="text-sm text-gray-400 uppercase">Sku: </label>
                    <label for="sku" class="text-sm text-gray-400">{{ $product->sku}}</label>
                </div>

                <div class="flex items-center space-x-4 mt-6">
                    @if($product->discount < 1)
                    <label for="discount" class="font-semibold text-xl mr-4 text-secondary-dark">{{ $product->price}}</label>
                    @else
                        <label for="discount" class="font-semibold text-xl mr-4 text-secondary-dark">{{ $product->discount}}</label>
                        <label for="price" class="line-through text-secondary-main text-base">{{ $product->price}}</label>
                    @endif
                </div>

                <div class="w-full flex mt-6">
                    <div class="w-full flex items-center space-x-2">
                        @foreach($colors as $cl)
                        <button wire:click="setColor('{{ $cl->value }}')" 
                            class="w-5 h-5 
                                @if($color === $cl->value)
                                    shadow shadow-secondary-main
                                @endif
                                bg-{{ $cl->value }} rounded-full"></button>
                        @endforeach
                    </div>
                    <div style="display:none" 
                        class="bg-white
                            bg-orange-500 
                            bg-gray-500
                            bg-gray-900
                            bg-black 
                            bg-pink-500
                            bg-gray-500
                            bg-blue-500
                            bg-blue-800
                            bg-green-500
                            bg-orange-200
                            bg-purble-500
                            bg-yellow-500"
                            >
                    </div>
                </div>

                <div class="w-full flex mt-6">
                    <div
                        class="w-full flex items-center space-x-2">
                        @foreach($sizes as $sz)
                            <button wire:click="setSize('{{ $sz->name }}')"
                                    class="uppercase px-4 py-2 border 
                                            @if($size === $sz->name) 
                                                bg-primary-dark
                                            @else 
                                                bg-secondary-line
                                            @endif
                                            border-primary-main rounded-md duration-150 hover:bg-primary-main hover:drop-shadow-lg">
                                {{ $sz->name }}
                            </button>    
                        @endforeach
                    </div>
                </div>

                <!-- Set Quantity -->
                <div class="w-full flex mt-6">
                    <div class="w-full flex items-center justify-between">

                        <div class="flex items-center space-x-4">
                            <button wire:click="setQuantity('-')"
                                class="px-4 py-3 leading-none text-sm border border-primary-main rounded-md duration-150 hover:bg-primary-main hover:drop-shadow-lg">
                                <x-orchid-icon path="arrow-down" />
                            </button>

                            <input wire:model="quantity"
                                    type="text" 
                                    class="border border-primary-main rounded-md focus:outline-none 
                                            focus:border-transparent focus:ring-2
                                            w-10 text-md leading-none inline-flex focus:ring-secondary-dark
                                            items-center text-center font-semibold"
                                            >

                            <button wire:click="setQuantity('+')"
                                class="px-4 py-3 leading-none text-sm border border-primary-main rounded-md duration-150 hover:bg-primary-main hover:drop-shadow-lg">
                                <x-orchid-icon path="arrow-up" />
                            </button>

                        </div>
                    </div>
                </div>

                <div
                    class="w-full 
                    md:flex mt-6 border-b 
                    md:space-x-4
                    border-primary-main pb-6"
                    >
                    <button 
                        wire:click="addCart({{ $product->id }})" 
                        @click.prevent="$store.shop.toggleSlideCart()"
                        class="px-6 py-3 rounded-md
                        drop-shadow-md 
                        hover:drop-shadow-xl
                        bg-secondary-main 
                        hover:bg-secondary-dark 
                        duration-150 
                        text-secondary-text 
                        text-base leading-none 
                        font-semibold uppercase"
                        >Thêm Vào Giỏ
                    </button>
                </div>

                <div class="w-full mt-6">
                    <h2 class="text-xl font-semibold mt-4">Mô Tả</h2>
                    <div class="text-main-text font-sm mt-4">
                        {!! $product->description !!}
                    </div>
                </div>

            </div>

        </div>
    
    </div>
</div>
