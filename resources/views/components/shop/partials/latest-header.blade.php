@props(['title' => 'latest', 'titleClass' => ''])
<div {{ $attributes->merge(['class' => 'pb-5 border-b border-black']) }}>
    <h3 class="{{ $titleClass }} text-xl md:text-3xl font-bold leading-6"> {{ $title }} </h3>
</div>
