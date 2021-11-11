@props([ 'title' => 'latest'])
<section>
    <div class=" relative items-center w-full px-5 py-6 md:py-10 mx-auto md:px-6 xl:px-none max-w-7xl">
        <x-shop.partials.latest-header 
            class="border-primary-dark"
            :title="$title" 
            titleClass="capitalize text-secondary-dark" />
        <div class="relative">
            <div class="grid max-w-lg gap-4 md:gap-8 mx-auto mt-8 md:mt-12 lg:grid-cols-3 xl:grid-cols-4 lg:max-w-none">
                @php 
                    $products = collect([
                        [
                            'name' => 'Đầm Dây kéo Khối Màu Giải trí',
                            'cover_image' => 'https://img.ltwebstatic.com/images3_pi/2021/07/15/1626318759c9b3369189f0cf8a885d4a20db448cdf.jpg',
                        ],
                        [
                            'name' => 'Đầm Chia Nút phía trước răng cưa Thanh lịch',
                            'cover_image' => 'https://img.ltwebstatic.com/images3_pi/2021/10/09/163374545203eed6584ae8537c621681fd541bc06d_thumbnail_600x.jpg',
                        ],
                        [
                            'name' => 'Đầm Chia Dây kéo Khối Màu răng cưa Thanh lịch',
                            'cover_image' => 'https://img.ltwebstatic.com/images3_pi/2021/09/06/1630899426ff51bfdd0dfec6450f4e528c2e68fae4_thumbnail_600x.jpg',
                        ],
                        [
                            'name' => 'Đầm răng cưa Thanh lịch',
                            'cover_image' => 'https://img.ltwebstatic.com/images3_pi/2020/11/19/1605752642b1c102e7d0342fa2bf0f88906fa87d98_thumbnail_600x.jpg',
                        ],
                        [
                            'name' => 'Đầm Dây kéo Khối Màu Giải trí',
                            'cover_image' => 'https://img.ltwebstatic.com/images3_pi/2021/07/15/1626318759c9b3369189f0cf8a885d4a20db448cdf.jpg',
                        ],
                        [
                            'name' => 'Đầm Chia Nút phía trước răng cưa Thanh lịch',
                            'cover_image' => 'https://img.ltwebstatic.com/images3_pi/2021/10/09/163374545203eed6584ae8537c621681fd541bc06d_thumbnail_600x.jpg',
                        ],
                        [
                            'name' => 'Đầm Chia Dây kéo Khối Màu răng cưa Thanh lịch',
                            'cover_image' => 'https://img.ltwebstatic.com/images3_pi/2021/09/06/1630899426ff51bfdd0dfec6450f4e528c2e68fae4_thumbnail_600x.jpg',
                        ],
                        [
                            'name' => 'Đầm răng cưa Thanh lịch',
                            'cover_image' => 'https://img.ltwebstatic.com/images3_pi/2020/11/19/1605752642b1c102e7d0342fa2bf0f88906fa87d98_thumbnail_600x.jpg',
                        ],
                    ]);
                @endphp

                @foreach($products as $product)
                <div class="flex flex-col mb-5 md:mb-8 overflow-hidden cursor-pointer p-2">

                    <a href="/blog-post">
                        <div class="flex-shrink-0 rounded-lg p-1 shadow-md">
                            <img class="object-cover w-full h-96 rounded-lg" 
                                 src="{{ $product['cover_image'] }}" alt="">
                        </div>
                    </a>

                    <div class="flex flex-col justify-between flex-1">
                        <a href="/blog-post"> </a>
                        <div class="flex-1">
                            <a href="/blog-post">
                                <div class="flex pt-6 text-sm font-medium text-secondary-main">
                                    <span>Category </span>
                                </div>
                            </a>
                            <a href="#" class="block mt-2 space-y-6">
                                <h3 class="
                                   text-2xl
                                   font-semibold
                                   leading-none
                                   tracking-tighter
                                   text-secondary-dark
                                   ">
                                    {{ $product['name'] }}
                                </h3>
                                <!--------->
                            </a>

                        </div>

                        <div class="inline-flex items-center justify-between rounded-full shadow mt-4 p-1">
                            <bottom class="rounded-full bg-primary-main text-primary-text px-4 md:px-6 py-1 text-sm font-bold">250.000 đ</bottom>
                            <bottom class="rounded-full px-4 md:px-6 py-1 line-through text-sm text-primary-dark">450.000 đ</bottom>
                        </div>

                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

