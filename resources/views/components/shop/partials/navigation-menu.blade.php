<section class="bg-primary-dark">
    <div class="w-full max-w-7xl mx-auto">
        <div x-data="{ open: false }" class="
                     flex flex-col
                     max-w-screen-xl
                     p-5
                     mx-auto
                     md:items-center 
                     md:justify-between 
                     md:flex-row 
                     md:px-6
                     xl:px-none
                     ">
            <div class="flex flex-row items-center justify-between lg:justify-start">
                <a href="{{ route('home') }}" class="
                         text-4xl
                         font-bold
                         tracking-tighter
                         uppercase
                         text-secondary-main
                         transition
                         duration-500
                         ease-in-out
                         transform
                         tracking-relaxed
                         lg:pr-8
                         "> Trillfa </a>
                <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                    <x-icons.menu-alt-3 />
                </button>
            </div>
            @php 
                $topMenu = [ ['label' => 'Trang chủ', 'url' => '/'], ['label' => 'Shop', 'url' => '/shop'], ['label' => 'Tin tức', 'url' => '/blog'] ];
            @endphp
            <nav :class="{'flex': open, 'hidden': !open}" 
                class="flex-col items-center flex-grow pb-4 md:pb-0 md:flex md:justify-end md:flex-row lg:pl-2 hidden">

                @foreach($topMenu as  $menu)
                <a class="
                          px-4
                          py-2
                          mt-2
                          text-sm 
                          text-primary-text
                          capitalize
                          md:mt-0
                          hover:text-secondary-main
                          focus:outline-none focus:shadow-outline
                          " href="{{ $menu['url'] }}">{{ $menu['label'] }}</a>
                @endforeach

                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="
                                    flex flex-row
                                    items-center
                                    w-full
                                    px-4
                                    py-2
                                    mt-2
                                    text-sm 
                                    text-left 
                                    text-primary-text
                                    md:w-auto md:inline md:mt-0
                                    hover:text-secondary-main
                                    focus:outline-none focus:shadow-outline
                                    ">
                        <span>Thông Tin</span>
                        <x-icons.chevron-down-rotation />
                    </button>
                    <!-- dropdown menu -->
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95" 
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75" 
                         x-transition:leave-start="transform opacity-100 scale-100" 
                         x-transition:leave-end="transform opacity-0 scale-95" 
                         class="absolute
                                right-0
                                z-30
                                w-full
                                mt-2
                                origin-top-right
                                rounded-md
                                shadow-lg
                                md:w-48
                                " 
                         style="display: none">
                        @php 
                            $gioiThieu = [ ['label' => 'Giới Thiệu', 'url' => '/about'], ['label' => 'Liên Hệ', 'url' => '/contact'] ];
                        @endphp
                        <div class="px-2 py-2 bg-white rounded-md shadow">
                            @foreach($gioiThieu as $menu)
                            <a class="
                                      block
                                      px-4
                                      py-2
                                      mt-2
                                      capitalize
                                      text-sm text-primary-text
                                      md:mt-0
                                      hover:text-secondary-main
                                      focus:outline-none focus:shadow-outline
                                      " href="{{ $menu['url'] }}">{{ $menu['label'] }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="inline-flex items-center gap-2 list-none lg:ml-auto">
                    <form action="" method="post" id="revue-form" name="revue-form" target="_blank" class="
                                  p-1
                                  transition
                                  duration-500
                                  ease-in-out
                                  transform
                                  border2
                                  bg-primary-light
                                  rounded-xl
                                  sm:max-w-lg sm:flex
                                  ">
                        <div class="flex-1 min-w-0 revue-form-group">
                            <label for="search" class="sr-only">Search</label>
                            <input id="cta-email" type="text" class="
                                       block
                                       w-full
                                       px-5
                                       py-3
                                       text-base 
                                       text-primary-text
                                       placeholder-primary-dark
                                       transition
                                       duration-500
                                       ease-in-out
                                       transform
                                       bg-transparent
                                       border border-transparent
                                       rounded-md
                                       focus:outline-none
                                       focus:border-transparent
                                       focus:ring-2
                                       focus:ring-white
                                       focus:ring-offset-2
                                       focus:ring-offset-gray-300
                                       " 
                                       placeholder="Nhập nội dung cần tìm ">
                        </div>
                        <div class="mt-4 sm:mt-0 sm:ml-3 revue-form-actions">
                            <button type="submit" value="Subscribe" name="member[subscribe]" id="member_submit" class="
                                          block
                                          w-full
                                          px-5
                                          py-3
                                          text-base
                                          font-medium
                                          text-white
                                          bg-secondary-main
                                          border border-transparent
                                          rounded-lg
                                          shadow
                                          hover:bg-blue-500
                                          focus:outline-none
                                          focus:ring-2
                                          focus:ring-white
                                          focus:ring-offset-2
                                          focus:ring-offset-gray-300
                                          sm:px-10
                                          "> Tìm Kiếm </button>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>
    
    <div class="bg-primary-main">
        @php  
            $mainMenu = [
                'Áo',
                'Quần',
                'Áo Khoác',
                'Váy',
                'Đầm',
                'Áo Dài Cách Tân',
                'Đồ bay',
                'Áo đôi',
            ];
        @endphp
    
        <div class="max-w-7xl mx-auto p-5 md-px-6 xl-px-none overflow-y-auto whitespace-nowrap scroll-hidden border-b border-primary-dark">
            <ul class="inline-flex items-center list-none justify-center space-x-6">
                @foreach($mainMenu as $menu)
                <li> <a href="#" class="
                             py-1
                             mr-1
                             text-base
                             font-semibold
                             capitalize
                             text-primary-text
                             transition
                             duration-500
                             ease-in-out
                             transform
                             rounded-md
                             focus:shadow-outline focus:outline-none focus:ring-2
                             ring-offset-current ring-offset-2
                             hover:text-secondary-main
                             ">{{ $menu }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    
</section>
