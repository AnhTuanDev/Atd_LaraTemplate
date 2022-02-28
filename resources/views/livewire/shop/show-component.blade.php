<div class="content">
    <section class="max-w-7xl mx-auto px-5 md:px-7">
        <livewire:partials.breadcrumbs
            shop="shop"
            :currentItemName="$product->name" 
            :category="$product->category" 
            />
    </section>
    <section>
        <div class="w-full max-w-7xl px-5 mx-auto md:px-6 xl:px-none md:grid md:grid-cols-12 md:gap-6 border-b pb-10">
            <div x-data="{ imgList: {{$photos}} }"
                class="w-full md:col-span-6">
                <div x-data="{ show: 0, imgkey: 0 }"
                    class="flex flex-col md:flex-row w-full">
                    <!-- Danh sach image --> 
                    <div class="flex order-last justify-center
                        md:justify-start overflow-auto md:order-first mt-2 md:-mt-3
                        md:space-y-2 md:space-x-0 md:flex-col tems-center
                        rounded-md md:h-screen space-x-2 p-1 md:mr-2
                        ">
                        <template x-for="(img, key) in imgList" :key="img.id">
                            <img 
                                @click="show = key"
                                :alt="img.original_name"
                                :src="img.url" 
                                :class="show == key ? 
                                'border-2 border-secondary-main' : 'border-primary-dark'"
                                class="w-10 md:w-14 object-container 
                                object-center rounded shadow duration-100
                                ease-in-out border"
                                >
                        </template>
                    </div>
                    <!-- Acive image --> 
                    <div 
                        :class="$store.shop.imageZoom ? 
                        'fixed inset-0 z-[9999] w-full h-screen bg-gray-900 bg-opacity-95' : ''"
                        class="duration-200 ease-in-out">
                        <div :class="$store.shop.imageZoom ? 'h-screen' : ''"
                            class="relative flex items-center justify-center">
                            <div x-data="{zoom: false}" 
                                @click.outside="$store.shop.overflow = false; $store.shop.imageZoom = false; zoom = false"
                                :class="$store.shop.imageZoom ? 'h-screen overflow-auto atd-scrollbar atd-scrollbar-none' : ''"
                                class="touck-auto"
                                >
                                <template x-for="(img, key) in imgList" :key="img.id">
                                    <div 
                                        @click.prevent="imgkey = key"
                                        x-show=" show  == key "
                                        class="w-full h-full flex flex-row items-center">
                                        <div 
                                            @click.prevent="$store.shop.overflow = true; $store.shop.imageZoom = true"
                                            :class="show === key ? 'translate-open' : 'translate-leave'"
                                            class="w-full">
                                            <img 
                                                :src="img.url" alt=""
                                                :class="[ 
                                                    zoom ? 'scale-150 origin-top-left' : 'w-198 max-screen', 
                                                    $store.shop.imageZoom ? 'w-198 max-w-screen rounded-0' : 'rounded' 
                                                ]"
                                                class="w-full object-cover object-center duration-100 ease-in-out" >
                                
                                        </div>
                                    </div>
                                </template>
                                
                                <div style="display: none" x-show="$store.shop.imageZoom" 
                                    class="fixed bottom-0 left-0 mb-3 md:mb-5 w-full flex items-center justify-center mt-5">
                                    <div @click="zoom = !zoom">
                                        <button x-cloak x-show="!zoom" 
                                            class="shadow-md mr-3 p-1
                                            bg-gray-700 rounded-full h-full 
                                            flex items-center border border-gray-300 
                                            leading-none text-gray-100 
                                            text-sm"
                                            >
                                            <x-orchid-icon path="size-fullscreen" class="w-[2.5] h-[2.5] md:w-4 md:h-4" />
                                        </button>
                                        <button x-cloak x-show="zoom" 
                                            class="shadow-md mr-2 p-1
                                            bg-gray-700 rounded-full h-full 
                                            flex items-center border border-gray-300 
                                            leading-none text-gray-100 
                                            text-sm"
                                            ><x-orchid-icon path="size-actual" class="w-[2.5] h-[2.5] md:w-4 md:h-4" />
                                        </button>
                                    </div>
                                    <div 
                                        class="flex flex-wrap items-center
                                        justify-center tems-center
                                        rounded-full bg-gray-900 
                                        bg-opacity-75 p-1
                                        ">
                                        <template x-for="(img, key) in imgList" :key="img.id" >
                                            <div class="p-[3px]">
                                                <img 
                                                    @click="show = key"
                                                    @click.prevent="zoom = false"
                                                    :alt="img.original_name"
                                                    :src="img.url" 
                                                    :class="show == key ? 'border border-2 border-secondary-main' : ''"
                                                    class="shadow-sm shadow-secondary-main 
                                                    w-5 h-5 md:w-10 md:h-10 object-cover 
                                                    object-center rounded-full 
                                                    duration-100 ease-in-out" 
                                                    >
                                            </div>
                                        </template>
                                    </div>
                                    <div x-cloak @click="$store.shop.overflow = false">
                                        <div @click="zoom = false">
                                            <button 
                                                @click="$store.shop.imageZoom = false" 
                                                class="shadow-md ml-2 p-1 
                                                bg-gray-700 rounded-full h-full 
                                                flex items-center border 
                                                border-gray-300 leading-none 
                                                text-gray-100 text-md md:text-xl">
                                                <x-orchid-icon path="cross" class="w-3 h-3 md:w-4 md:h-4" />
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Detail -->
            <div class="w-full md:col-span-6 mx-w-7xl">
                <h2 class="text-2xl text-secondary-main 
                    border-primary-main font-semibold 
                    pb-2 border-b cursor-pointer
                    mt-6 md:mt-0
                    "> {{$product->name}} 
                </h2>
                <div class="flex items-center space-x-2 mt-4">
                    <label for="sku" class="text-sm text-gray-400 uppercase">Sku: </label>
                    <label for="sku" class="text-sm text-gray-400">{{ $product->sku}}</label>
                </div>
                <div class="flex items-center space-x-4 mt-4">
                    @if($product->discount < 1)
                    <label for="discount" class="font-semibold text-xl mr-4 text-secondary-dark">{{ $product->price}}</label>
                    @else
                        <label for="discount" class="font-semibold text-xl mr-4 text-secondary-dark">{{ $product->discount}}</label>
                        <label for="price" class="line-through text-secondary-main text-base">{{ $product->price}}</label>
                    @endif
                </div>
                <div class="w-full flex mt-4">
                    <div class="w-full flex items-center space-x-2">
                        @foreach($colors as $cl)
                        <button wire:click="setColor('{{ $cl->value }}')" 
                            class="w-5 h-5 
                            @if($color === $cl->value)
                                shadow shadow-secondary-main
                            @endif
                            bg-{{ $cl->value }} rounded-full
                            ">
                        </button>
                        @endforeach
                    </div>
                    <div style="display:none" 
                        class="bg-white bg-orange-500 bg-gray-500
                        bg-gray-900 bg-black bg-pink-500 bg-gray-500
                        bg-blue-500 bg-blue-800 bg-green-500 bg-orange-200
                        bg-purble-500 bg-yellow-500
                        ">
                    </div>
                </div>
                <div class="w-full flex mt-4">
                    <div class="w-full flex items-center space-x-2">
                        @foreach($sizes as $sz)
                            <button wire:click="setSize('{{ $sz->name }}')"
                                class="uppercase px-4 py-2 border border-primary-main 
                                rounded-md duration-100 hover:drop-shadow-lg
                                @if($size === $sz->name) bg-primary-dark
                                @else bg-secondary-line @endif
                                ">{{ $sz->name }}
                            </button>    
                        @endforeach
                    </div>
                </div>

                <!-- Set Quantity -->
                <div class="w-full flex mt-4">
                    <div class="w-full flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <button wire:click="setQuantity('-')"
                                class="px-4 py-3 leading-none 
                                text-sm border border-primary-main 
                                rounded-md duration-150 
                                hover:bg-primary-main 
                                hover:drop-shadow-lg
                                "><x-orchid-icon path="arrow-down" />
                            </button>
                            <input 
                                wire:model="quantity"
                                type="text" 
                                class="border border-primary-main rounded-md focus:outline-none 
                                focus:border-transparent focus:ring-2
                                w-10 text-md leading-none inline-flex focus:ring-secondary-dark
                                items-center text-center font-semibold
                                ">
                            <button wire:click="setQuantity('+')"
                                class="px-4 py-3 leading-none 
                                text-sm border border-primary-main 
                                rounded-md duration-150 
                                hover:bg-primary-main 
                                hover:drop-shadow-lg
                                "><x-orchid-icon path="arrow-up" />
                            </button>
                        </div>
                    </div>
                </div>
                <div class="w-full md:flex mt-4 border-b 
                    md:space-x-4 border-primary-main pb-6
                    ">
                    {{-- Add to cart --}}
                    <button 
                        wire:click="addCart({{ $product->id }})" 
                        @click.prevent="$store.shop.toggleSlideCart()"
                        class="px-6 py-3 rounded-md drop-shadow-md 
                        hover:drop-shadow-xl bg-secondary-main 
                        hover:bg-secondary-dark duration-150 
                        text-secondary-text text-base leading-none 
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
    </section>
    <section class="px-5 w-full mx-auto xl:px-none max-w-7xl">
        <!-- product list -->
        <div class="relative w-full">
            <!-- Header title Bar -->
            <h3 class="pb-3 mt-6 flex items-center justify-center 
                text-secondary-main text-lg md:text-2xl 
                font-semibold cursor-pointer
                uppercase
                "> Sản Phẩm Cùng Loại
            </h3>
            <div class="mt-5 gap-x-6 gap-y-8 grid grid md:grid-cols-4">
                @isset($products)
                    @foreach($products as $item)
                        @if($item->id != $product->id)
                            <x-shop.partials.product-list-item :product="$item" />
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="px-5 py-4">
                {{-- {{ $products->links() }} --}}
            </div>

        </div>
        <!-- product list -->
    </section>

</div>
