@props([ 
    'banners' => [
       [ 'slug' => '/#home-banner-top', 'title' => 'Lãng mạn', 'image' => '/git_storage/panner/panner-1.jpg'],
       [ 'slug' => '/#home-banner-top', 'title' => 'Thanh Lịch', 'image' => '/git_storage/panner/panner-2.jpg'],
    ], 
])

<section id="home-banner-top" class="relative max-w-7xl mx-auto mt-0 md:mt-10 lg:mt-10">
    <div class="grid grid-cols-12 gap-6 md:gap-8 p-6 md:p-8">
        @foreach($banners as $banner)
        <div class="
                    shadow-lg relative w-full h-96 md:h-72 p-2 overflow-hidden
                    sm:aspect-w-2 sm:aspect-h-1 sm:h-64 
                    lg:aspect-w-1 lg:aspect-h-1 group col-span-12 md:col-span-6
            ">
             <img class="w-full h-full object-cover object-center group-hover:opacity-[65%] duration-200 ease-out"
                  src="{{ $banner['image']}}" alt="">

            <div class="w-full hfull absolute z-100 inset-0 flex justify-center items-center uppercase">
                <a href="{{ $banner['slug'] }}" class="text-xl md:text-2xl font-medium text-primary-light group-hover:bg-opacity-50 
                               bg-secondary-main px-12 py-4 duration-200 ease-out group-hover:text-primary-text
                               shadow ring-8 ring-primary-light ring-opacity-50"
                    >{{ $banner['title']}}</a>
            </div>

        </div>
        @endforeach

    </div>
</section>
