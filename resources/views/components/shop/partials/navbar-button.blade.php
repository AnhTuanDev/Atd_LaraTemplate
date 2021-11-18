@props([ 'label' => 'name' ])

<button 
    @click.prevent="open = '{{ $label }}'"
    type="button" 
    aria-expanded="false"
    :class="{ 'border-secondary-main' : open === '{{ $label }}' } "
    class="
        text-primary-text hover:text-secondary-main border-transparent
        relative z-50 flex items-center transition-colors mx-8
        ease-out duration-200 text-md font-semibold border-b-2 -mb-px pt-px
    ">
        {{ $label ?? 'category name' }}

</button>
