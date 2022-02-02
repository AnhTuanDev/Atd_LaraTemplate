@props([ 'label' => 'Button', 'link' => 'home'])
<a 
    href="{{ $link }}"
    class="
        items-center block px-4 md:px-10 py-2 text-base
        font-medium text-center text-primary-text bg-primary-dark hover:bg-primary-light
        transition duration-500 ease-in-out transform shadow-md
        rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2
        focus:ring-primary-dark">{{ $label }}
</a>
