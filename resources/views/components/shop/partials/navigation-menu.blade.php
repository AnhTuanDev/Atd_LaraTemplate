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
            <a href="/" class="
                     text-lg
                     font-bold
                     tracking-tighter
                     text-secondary-main
                     transition
                     duration-500
                     ease-in-out
                     transform
                     tracking-relaxed
                     lg:pr-8
                     "> Trillfa </a>
            <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8">
                    <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" style="display: none;"></path>
                </svg>
            </button>
        </div>
        <nav :class="{'flex': open, 'hidden': !open}" 
            class="flex-col items-center flex-grow pb-4 md:pb-0 md:flex md:justify-end md:flex-row lg:pl-2 hidden">
            <a class="
                      px-4
                      py-2
                      mt-2
                      text-sm text-primary-text
                      md:mt-0
                      hover:text-secondary-main
                      focus:outline-none focus:shadow-outline
                      " href="#">About</a>
            <a class="
                      px-4
                      py-2
                      mt-2
                      text-sm text-primary-text
                      md:mt-0
                      hover:text-secondary-main
                      focus:outline-none focus:shadow-outline
                      " href="#">Contact</a>
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="
                                flex flex-row
                                items-center
                                w-full
                                px-4
                                py-2
                                mt-2
                                text-sm text-left text-primary-text
                                md:w-auto md:inline md:mt-0
                                hover:text-secondary-main
                                focus:outline-none focus:shadow-outline
                                ">
                    <span>Dropdown List</span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform rotate-0 md:-mt-1">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="
                             absolute
                             right-0
                             z-30
                             w-full
                             mt-2
                             origin-top-right
                             rounded-md
                             shadow-lg
                             md:w-48
                             " style="display: none">
                    <div class="px-2 py-2 bg-white rounded-md shadow">
                        <a class="
                                  block
                                  px-4
                                  py-2
                                  mt-2
                                  text-sm text-primary-text
                                  md:mt-0
                                  hover:text-secondary-main
                                  focus:outline-none focus:shadow-outline
                                  " href="#">Link #1</a>
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
                              bg-gray-50
                              rounded-xl
                              sm:max-w-lg sm:flex
                              ">
                    <div class="flex-1 min-w-0 revue-form-group">
                        <label for="search" class="sr-only">Search</label>
                        <input id="cta-email" type="email" class="
                                   block
                                   w-full
                                   px-5
                                   py-3
                                   text-base text-neutral-600
                                   placeholder-gray-300
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
                                   " placeholder="Enter your email  ">
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
            'Áo Dài Cách Tân'
        ];
    @endphp

    <div class="max-w-7xl mx-auto p-5 md-px-6 xl-px-none overflow-y-auto whitespace-nowrap scroll-hidden border-b">
        <ul class="inline-flex items-center list-none justify-center">
            @foreach($mainMenu as $menu)
            <li> <a href="#" class="
                         px-4
                         py-1
                         mr-1
                         text-base
                         font-semibold
                         uppercase
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

