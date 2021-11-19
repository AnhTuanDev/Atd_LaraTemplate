@props([ 'label' => 'Button', 'link' => 'home'])
<a 
    href="{{ $link }}"
    class="
        items-center 
        block px-4 md:px-10 py-2 md:py-4 text-base 
        font-medium text-center text-secondary-text transition 
        duration-500 ease-in-out transform bg-secondary-dark
        rounded-xl hover:bg-secondary-main focus:outline-none 
        focus:ring-2 focus:ring-offset-2 focus:ring-secondary-dark
        ">{{ $label }}
</a>
