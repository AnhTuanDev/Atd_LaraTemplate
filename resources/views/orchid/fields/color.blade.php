@foreach($data->colors as $item)
    @component($typeForm, get_defined_vars())
        <a data-turbo="{{ var_export($turbo) }}"

            {{ $attributes->merge(['class' => 'mt-1']) }} >

            @isset($icon)
                <x-orchid-icon :path="$icon" class=""/>
            @endisset

            {{ $item->name ?? '' }}

        </a>
    @endcomponent
@endforeach
