@props(['title' => 'latest', 'titleClass' => ''])
<div {{ $attributes->merge(['class' => 'flex items-center pb-5 border-b']) }}>
    <h3 class="@isset($titleClass){{ $titleClass }}@endif text-xl md:text-3xl font-bold leading-6"> {{ $title }} </h3>
</div>
