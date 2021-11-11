@props([ 'title' => 'latest'])
<section>
    <div class="max-w-7xl px-4 pt-8 md:py-12 mx-auto">

        <x-shop.partials.latest-header 
            class="border-primary-dark"
            :title="$title" 
            titleClass="capitalize text-secondary-dark" />

        @php 
            $posts = collect([
                [
                    'title' => 'Đầm Dây kéo Khối Màu Giải trí',
                    'cover_image' => 'https://img.ltwebstatic.com/images3_pi/2021/07/15/1626318759c9b3369189f0cf8a885d4a20db448cdf.jpg',
                ],
                [
                    'title' => 'Đầm Chia Nút phía trước răng cưa Thanh lịch',
                    'cover_image' => 'https://img.ltwebstatic.com/images3_pi/2021/10/09/163374545203eed6584ae8537c621681fd541bc06d_thumbnail_600x.jpg',
                ],
                [
                    'title' => 'Đầm Chia Dây kéo Khối Màu răng cưa Thanh lịch',
                    'cover_image' => 'https://img.ltwebstatic.com/images3_pi/2021/09/06/1630899426ff51bfdd0dfec6450f4e528c2e68fae4_thumbnail_600x.jpg',
                ],
                [
                    'title' => 'Đầm răng cưa Thanh lịch',
                    'cover_image' => 'https://img.ltwebstatic.com/images3_pi/2020/11/19/1605752642b1c102e7d0342fa2bf0f88906fa87d98_thumbnail_600x.jpg',
                ],
            ]);
        @endphp
        <div class="grid grid-cols-1 md:gap-l8 g:grid-cols-2">
            @foreach($posts as $post)
            <div class="bt-5 md:pt-8 xl:pt-10">
                <div class="space-y-8 lg:divide-y lg:divide-gray-100">

                    <div class="pt-8 md:pt-0 sm:flex lg:items-start group">

                        <div class="flex-shrink-0 mb-4 sm:mb-0 sm:mr-4">
                            <img class="w-full rounded-md sm:h-32 sm:w-32 object-cover" 
                                src="{{ $post['cover_image'] }}" alt="text">
                        </div>

                        <div>
                            <span class="text-sm text-gray-300">August 20.20.21</span>
                            <p class="mt-3 text-lg font-medium leading-6">
                            <a href="./blog-post.html" class="
                                     text-xl text-neutral-600
                                     lg:text-2xl
                                     hopver:text-gray-300
                                     ">{{ $post['title'] }}</a>
                            </p>
                            <p class="mt-2 text-lg text-magnesium">
                                A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. 
                            </p>
                        </div>

                    </div>

                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>

