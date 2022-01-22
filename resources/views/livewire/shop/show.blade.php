<div class="content">

    <div class="max-w-7xl mx-auto">
        {{$product->name}}

        @foreach($photos as $img)

            <img src="{{ $img->url() }}" alt="">

        @endforeach
    
    </div>
</div>
