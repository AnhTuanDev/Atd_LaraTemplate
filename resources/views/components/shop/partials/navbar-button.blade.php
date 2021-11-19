@props([ 'label' => 'name' ])

<button 
    @click.prevent="open = '{{ $label }}'"
    type="button" 
    aria-expanded="false"
    :class=" open === '{{ $label }}' ? 'border-b-2 border-secondary-main' : 'border-transparent' "
    class="
        text-primary-text hover:text-secondary-main
        relative z-50 flex items-center transition-colors mx-8
        ease-out duration-200 text-md font-semibold -mb-px pt-px
    ">
        {{ $label ?? 'category name' }}

</button>
