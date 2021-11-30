<div class="hidden lg:block mt-8 md:mt-12 bg-primary-light text-md text-primary-text">

    <h3 class="sr-only">Categories</h3>

    <div class="font-medium text-priamry-text cursor-pointer">

        <div class="mt-2">
            <input type="text"
                wire:model="term"
                placeholder="Nhập tìm kiếm"
                class="w-full border border-primary-dark rounded-md mb-6 shadow-md">
        </div>

        @isset($parentCate)
            @foreach($parentCate as $key => $parent)
                @if($parent->child->count())
                    <div x-data="{ open: false }" class="relative">

                        <div @click.prevent="open = !open "
                            class="py-3 border-b
                                border-dashed
                                border-opacity-[35%]
                                border-secondary-light
                                hover:bg-primary-main
                                hover:pl-4
                                hover:border-transparent
                                ease-out duration-200"
                                    >{{ $parent->name }}
                        </div>
                        
                            <div x-data="{ isActive: null}" 
                                x-show="open" 
                                @click.away="open = false"
                                x-transition:enter.duration-200.origi.top.left
                                style="display: none"
                                class="w-full mt-2 px-4 pb-2 font-medium text-gray-900
                                    overflow-hidden shadow-md border-l-4 border-secondary-light">

                                    @foreach($parent->child as $sub)
                                        <div
                                            wire:click="setCategoryChecked({{ collect($sub) }})"
                                            @click="isActive = '{{ $sub->name }}'"
                                            :class="isActive === '{{ $sub->name }}' ? 'bg-secondary-light' : 'bg-transparent' "
                                            class="border-b last:border-b-transparent
                                            hover:bg-primary-main hocer:border-b-transition duration-150
                                            border-secondary-light border-opacity-25 py-4 flex items-center">
                                            <button 
                                                class="ml-2">{{ $sub->name }}</button>
                                        </div>
                                    @endforeach

                            </div>
                    </div>
                @endif
            @endforeach

            <div class="flex items-center">
                <button wire:click.prevent="resetCategoryFilter"
                    class="capitalize py-2 mt-3 
                        inline-flex items-center 
                        bg-primary-main duration-150
                        hover:shadow-md text-primary-text
                        hover:text-primary-light
                        hover:bg-primary-dark
                        px-4 py-2 rounded">
                        <x-orchid-icon path="refresh" class="mr-2" />Đặt lại
                </button>
            </div>

        @endif
    </div>
</div>
