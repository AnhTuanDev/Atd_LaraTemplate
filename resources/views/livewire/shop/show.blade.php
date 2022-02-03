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

                <div class="flex items-center space-x-4 mt-6">
                    @if($product->discount < 1)
                    <label for="discount" class="font-semibold text-lg mr-4 text-secondary-dark">{{ $product->price}} đ</label>
                    @else
                        <label for="discount" class="font-semibold text-lg mr-4 text-secondary-dark">{{ $product->discount}}</label>
                        <label for="price" class="line-through text-secondary-main text-base">{{ $product->price}}</label>
                    @endif
                </div>

                <div class="w-full flex mt-6">
                    <div class="w-full flex items-center space-x-2">
                        <button class="w-5 h-5 bg-green-500 rounded-full"></button>
                        <button class="w-5 h-5 bg-purple-500 rounded-full"></button>
                        <button class="w-5 h-5 bg-indigo-500 rounded-full"></button>
                    </div>
                </div>

                <div class="w-full flex mt-6">
                    <div class="w-full flex items-center space-x-2">
                        <button class="px-4 py-2 border border-primary-main rounded-md duration-150 hover:bg-primary-main hover:drop-shadow-lg">
                            S
                        </button>
                        <button class="px-4 py-2 border border-primary-main rounded-md duration-150 hover:bg-primary-main hover:drop-shadow-lg">
                            M
                        </button>
                        <button class="px-4 py-2 border border-primary-main rounded-md duration-150 hover:bg-primary-main hover:drop-shadow-lg">
                            L
                        </button>
                        <button class="px-4 py-2 border border-primary-main rounded-md duration-150 hover:bg-primary-main hover:drop-shadow-lg">
                            XL
                        </button>
                    </div>
                </div>

                <div class="w-full flex mt-6">
                    <div class="w-full flex items-center justify-between">

                        <div class="flex items-center space-x-4">
                            <button class="px-4 py-2 border border-primary-main rounded-md duration-150 hover:bg-primary-main hover:drop-shadow-lg">
                                <x-orchid-icon path="arrow-down" />
                            </button>
                            <div class="text-base leading-none px-4 py-2 inline-flex p-1 border border-primary-main rounded-md">1</div>
                            <button class="px-4 py-2 border border-primary-main rounded-md duration-150 hover:bg-primary-main hover:drop-shadow-lg">
                                <x-orchid-icon path="arrow-up" />
                            </button>
                        </div>
                    </div>
                </div>

                <div class="w-full flex mt-6 border-b border-primary-main pb-6">

                    <button class="px-4 py-2 rounded-md drop-shadow-md hover:drop-shadow-xl
                                bg-secondary-main hover:bg-secondary-dark duration-150 text-secondary-text 
                                text-base leading-none font-semibold"
                                >Mua Ngay
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
