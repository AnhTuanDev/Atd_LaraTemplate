<div
    class="hidden lg:block mt-8 md:mt-12 bg-primary-light text-md text-primary-text">

    <h3 class="sr-only">Categories</h3>

    <ul 
        x-data="{ open: false }"
        class="font-medium text-gray-900 space-y-4 pb-6 border-b border-primary-main">
        @isset($parentCate)
            @foreach($parentCate as $key => $parent)
                @if($parent->child->count())

                <li @click.prevent="open = {{$key}} ">{{ $parent->name }}</li>

                    <ul x-show="open === {{ $key }}" 
                        style="display: none"
                        class="font-medium text-gray-900 space-y-4 pb-6 border-b border-primary-main">
                        @foreach($parent->child as $sub)
                            <li>{{ $sub->name }}</li>
                        @endforeach
                    </ul>

                @endif

            @endforeach
        @endif
    </ul>
</div>
