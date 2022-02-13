<div class="content">

    <div class="max-w-7xl mx-auto">

        <div class="grid grid-cols-12 gap-6 my-8">

            <div class="w-full md:col-span-7">

                <div x-data="{ show: 0 }"
                    class="flex w-full">
                    <!-- Danh sach image --> 
                    <div class="flex flex-col space-y-2">
                        @foreach($photos as $index => $img)
                        
                        <img @click="show = {{ $index }}"
                                class="w-14 object-cover object-center rounded" src="{{ $img->url() }}" alt="">
                        
                        @endforeach
                    </div>

                    <!-- Acive image --> 
                    <div class="flex-1 md:ml-2">
                        @foreach($photos as $index => $img)
                        
                            <img x-show=" show  === {{ $index }} "
                                class="w-full object-container object-center rounded" src="{{ $img->url() }}" alt="">
                        
                        @endforeach
                    </div>

                </div>

            </div>

            <!-- Product Detail -->
            <div class="col-span-5">

                <h2 class="text-2xl font-semibold text-secondary-main pb-2 border-b border-primary-main"> {{$product->name}} </h2>

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
                        class="bg-orange-500 
                                bg-white
                                bg-black 
                                bg-pink-500
                                bg-gray-500
                                bg-blue-500
                                bg-blue-800
                                bg-green-500
                                bg-orange-200
                                bg-purble-500
                                bg-yellow-500">
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

                <div class="w-full flex mt-6 border-b border-primary-main pb-6">

                    <button wire:click="addCart({{ $product->id }})" 
                            class="px-6 py-3 rounded-md drop-shadow-md hover:drop-shadow-xl
                                bg-secondary-main hover:bg-secondary-dark duration-150 text-secondary-text 
                                text-base leading-none font-semibold uppercase"
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
