<div class="hidden lg:block mt-8 md:mt-12 bg-primary-light text-md text-primary-text">

    <h3 class="text-lg md:text-xl font-semibold capitalize">Danh Mục Sản Phẩm</h3>

    <div class="font-medium text-priamry-text cursor-pointer mt-4">

        @isset($parentCate)
            @foreach($parentCate as $key => $parent)
                @if($parent->child->count())
                    <div x-data="{ open: false }" class="relative">

                        <div @click.prevent="open = !open "
                            class="py-3 border-b border-dashed
                                border-opacity-[35%]
                                border-secondary-light
                                hover:bg-primary-main
                                hover:pl-4
                                hover:border-transparent
                                ease-out duration-200">{{ $parent->name }}
                        </div>
                        
                        <div x-data="{ isActive: null}" 
                            x-show="open" 
                            @click.away="open = false"
                            x-transition:enter.duration-200.origi.top.left
                            style="display: none"
                            class="w-full px-4 mt-2 pb-2 font-medium text-gray-900
                                overflow-hidden shadow-md border-l-4 border-secondary-light">
                                @foreach($parent->child as $sub)
                                    <div
                                        wire:click="setCategoryChecked({{ collect($sub) }})"
                                        @click="isActive = '{{ $sub->name }}'"
                                        :class=" isActive === '{{ $sub->name }}' ? 'bg-secondary-light' : 'bg-transparent' "
                                        class="border-b last:border-b-transparent
                                            hover:bg-primary-main hocer:border-b-transition duration-150
                                            border-secondary-light border-opacity-25 py-4 flex items-center">
                                            <button class="ml-2">{{ $sub->name }}</button>
                                    </div>
                                @endforeach
                        </div>
                    </div>
                @endif
            @endforeach

            <div class="flex items-center">
                <button
                    @click.prevent="priceBetween = null"
                    wire:click.prevent="resetCategoryFilter"
                    class="capitalize py-1.5 px-4 mt-3 
                        inline-flex items-center text-md
                        bg-primary-main duration-150
                        hover:shadow-md text-primary-text
                        hover:text-primary-light
                        hover:bg-primary-dark
                        rounded">
                        <x-orchid-icon path="refresh" class="mr-2" />Xem tất cả
                </button>
            </div>

        @endif
    </div>

    <div x-data="{ isActive: false }" 
        class="font-medium text-priamry-text cursor-pointer mt-6 md:mt-10">

        <h3 class="text-lg md:text-xl font-semibold capitalize">Xem Theo Khoảng Giá</h3>

        <div class="mt-4 w-full">
            @foreach($priceData as $key => $item)
                <div 
                    @click=" isActive = '{{ $key }}' "
                    @click.prevent=" priceBetween = '{{ $item['label'] }}' "
                    wire:click.prevent="setPriceChecked( {{ $item['value']['price_min']}}, {{ $item['value']['price_max']}} )"
                    :class=" isActive === '{{ $key }}' ? 'bg-primary-main pl-4 border-b-0' : '' "
                    class="py-3 border-b border-dashed
                        border-opacity-[35%]
                        border-secondary-light
                        hover:bg-primary-main
                        hover:pl-4
                        hover:border-transparent
                        ease-out duration-200">{{ $item['label'] }}
                </div>
            @endforeach
        </div>

        <div
            class="flex items-center">
            <button 
                @click=" isActive = false"
                @click.prevent=" priceBetween = null " 
                wire:click.prevent="$set('priceBetween', null)"
                class="capitalize py-1.5 px-4 mt-3 
                    inline-flex items-center text-md
                    bg-primary-main duration-150
                    hover:shadow-md text-primary-text
                    hover:text-primary-light
                    hover:bg-primary-dark
                    rounded">
                    <x-orchid-icon path="refresh" class="mr-2" />Mọi mức giá
            </button>
        </div>

    </div>
</div>
