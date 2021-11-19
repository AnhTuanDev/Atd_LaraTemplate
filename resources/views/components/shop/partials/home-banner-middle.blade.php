@props([ 
    'banner' => [ 'slug' => '/#home-banner-middle', 'title' => 'Lãng mạn', 'image' => '/git_storage/panner/panner-w-full-1.jpg'],
])
<section id="home-banner-middle" class="relative max-w-7xl mx-auto mt-0 md:mt-10 lg:mt-10">
    <div class="grid grid-cols-12 gap-6 md:gap-8 p-6 md:p-8">
        <div class="
            shadow-lg relative w-full h-96 md:h-72 p-2 overflow-hidden group col-span-12 ">
             <img class="w-full h-full object-cover object-center group-hover:opacity-[65%] duration-200 ease-out"
                  src="{{ $banner['image']}}" alt="">

            <div class="w-full hfull absolute z-100 inset-0 flex justify-center items-center uppercase">
                <a href="{{ $banner['slug'] }}" class="text-xl md:text-2xl font-medium text-primary-light group-hover:bg-opacity-50 
                               bg-secondary-main px-12 py-4 duration-200 ease-out group-hover:text-primary-text
                               shadow ring-8 ring-primary-light ring-opacity-50"
                    >{{ $banner['title']}}</a>
            </div>

        </div>

    </div>
</section>
