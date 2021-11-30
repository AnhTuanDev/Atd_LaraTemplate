@props([ 'title' => 'title', 'sortLabel' => 'desc', 'sortByData' => [], 'perPage' => 10, 'perPageData' => [], ])
<div class="relative w-full z-30 flex items-baseline justify-between whitespace-nowrap cursor-pointer">

    <h1 class="text-xl md:text-2xl font-extrabold tracking-tight text-gray-900">{{ $title }}</h1>

    <div class="flex-none flex items-center ml-auto pl-4 sm:pl-6">

        {{-- Sort By --}}
        <div x-data="{ open: false }" 
            class="relative flex items-center ml-6">

            <div @click="open = !open" 
                class="flex items-center">
                <div class="inline-flex text-md text-primary-tex capitalize mr-2">{{ $sortLabel }} </div>
                <x-icons.chevron-down-rotation />
            </div>

            <div x-show="open" @click.outside="open = false"
                style="display:none"
                class="absolute top-full right-0 mt-2 shadow-md rounded z-50 bg-primary-light">
                @foreach($sortByData as $item)
                    <div class="px-4 py-2 border-b border-primary-dark hover:bg-primary-main duration-150 last:border-b-0 last:rounded-b first:rounded-t"
                        @click="open = false"
                        wire:click.prevent="setSortBy('{{ $item['label'] }}', '{{ $item['value'] }}')" value="desc">{{ $item['label'] }}
                    </div>
                @endforeach
            </div>

        </div>

        {{-- Per Page --}}
        <div x-data="{ open: false }" 
            class="relative flex items-center ml-6">

            <div @click="open = !open" 
                class="flex items-center">
                <div class="inline-flex text-md text-primary-tex capitalize mr-2">{{ $perPage }} Sản phẩm </div>
                <x-icons.chevron-down-rotation />
            </div>

            <div x-show="open" @click.outside="open = false"
                style="display:none"
                class="absolute top-full right-0 mt-2 shadow-md rounded z-50 bg-primary-light">
                @foreach($perPageData as $item)
                    <div class="px-4 py-2 border-b border-primary-dark hover:bg-primary-main duration-150 last:border-b-0 last:rounded-b first:rounded-t"
                        @click="open = false"
                        wire:click.prevent="setPerPage('{{ $item }}')">{{ $item }}
                    </div>
                @endforeach
            </div>

        </div>

    </div>
</div>


