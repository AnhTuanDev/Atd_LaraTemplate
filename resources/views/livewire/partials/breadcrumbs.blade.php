<div class="content mt-5 px-5">

    <div class="flex
        cursor-pointer
        text-gray-500 
        leading-none 
        items-center 
        uppercase 
        max-w-7xl
        mx-auto 
        text-sm
        py-2
        ">

        @if(isset($home))
            <a href="{{ route('shop.home') }}"  class="inline-flex items-center">
                <x-orchid-icon path="home" class="mr-1"/>
                {{ $home }}
            </a>
        @endif

        @if(isset($shop))
            <a href="{{ route('shop.index') }}"  class="inline-flex items-center">
                <x-orchid-icon path="arrow-right" class="mx-2" />
                <x-orchid-icon path="bag" class="mr-1" />
                {{ $shop }}
            </a>
        @endif

        @if(isset($category) && !empty($category->name))
            @if(isset($currentItemName))
                <a href="{{ route('shop.category', $category->slug) }}"  class="inline-flex items-center">
                    <x-orchid-icon path="arrow-right" class="mx-2" />
                    {{ $category->name }}
                </a>
            @else
                <div class="text-gray-400 inline-flex items-center">
                    <x-orchid-icon path="arrow-right" class="mx-2" />
                    {{ $category->name }}
                </div>
            @endif
        @endif

        @if(isset($tag) && !empty($tag->name))
            @if(isset($currentItemName))
                <a href="{{ route('shop.category', $category->slug) }}"  class="inline-flex items-center">
                    <x-orchid-icon path="arrow-right" class="mx-2" />
                    {{ $tag->name }}
                </a>
            @else
                <div class="text-gray-400 inline-flex items-center">
                    <x-orchid-icon path="arrow-right" class="mx-2" />
                    {{ $tag->name }}
                </div>
            @endif
        @endif

        @if(isset($currentItemName))
            <div class="text-gray-400 inline-flex items-center">
                <x-orchid-icon path="arrow-right" class="mx-2 text-gray-500" />
                {{ $currentItemName }}
            </div>
        @endif

    </div>

</div>
