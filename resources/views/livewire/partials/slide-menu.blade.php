<div x-show="$store.shop.slideMenu" 
     style="display: none"
     class="fixed inset-0 flex z-40 lg:hidden"
     role="dialog"
     aria-modal="true">

    <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>

    <div class="relative max-w-xs w-full bg-primary-main shadow-xl pb-12 flex flex-col overflow-y-auto">
        <div class="px-4 pt-5 pb-2 flex">

            <button @click.prevent="$store.shop.toggleSlideMenu()"
             type="button" class="-m-2 p-2 rounded-md inline-flex items-center justify-center text-primay-text">
                <span class="sr-only">Close menu</span>
                <!-- Heroicon name: outline/x -->
                <x-icons.close />
            </button>
        </div>

        <!-- Links -->
        <div class="mt-2">
            <div class="border-b border-primary-dark">
                <div class="-mb-px flex px-4 space-x-8" aria-orientation="horizontal" role="tablist">
                    <!-- Selected: "text-indigo-600 border-indigo-600", Not Selected: "text-gray-900 border-transparent" -->
                    <button id="tabs-1-tab-1" class="text-gray-900 border-transparent flex-1 whitespace-nowrap py-4 px-1 border-b-2 text-base font-semibold" aria-controls="tabs-1-panel-1" role="tab" type="button">
                        Home 
                    </button>

                    <!-- Selected: "text-indigo-600 border-indigo-600", Not Selected: "text-gray-900 border-transparent" -->
                    <button id="tabs-1-tab-2" class="text-gray-900 border-transparent flex-1 whitespace-nowrap py-4 px-1 border-b-2 text-base font-semibold" aria-controls="tabs-1-panel-2" role="tab" type="button">
                        Shop 
                    </button>
                </div>
            </div>

            <!-- 'Women' tab panel, show/hide based on tab state. -->
            <div id="tabs-1-panel-1" class="pt-10 pb-8 px-4 space-y-10" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                <div class="grid grid-cols-2 gap-x-4">
                    <div class="group relative text-sm">
                        <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                            <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg" alt="Models sitting back to back, wearing Basic Tee in black and bone." class="object-center object-cover">
                        </div>
                        <a href="#" class="mt-6 block font-semibold text-gray-900">
                            <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                            New Arrivals
                        </a>
                        <p aria-hidden="true" class="mt-1">Shop now</p>
                    </div>

                    <div class="group relative text-sm">
                        <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                            <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg" alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees." class="object-center object-cover">
                        </div>
                        <a href="#" class="mt-6 block font-semibold text-gray-900">
                            <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                            Basic Tees
                        </a>
                        <p aria-hidden="true" class="mt-1">Shop now</p>
                    </div>
                </div>

                <div>
                    <p id="women-clothing-heading-mobile" class="font-semibold text-gray-900">
                    Clothing
                    </p>
                    <ul role="list" aria-labelledby="women-clothing-heading-mobile" class="mt-6 flex flex-col space-y-6">
                        <li class="flow-root">
                            <a href="#" class="-m-2 p-2 block text-gray-500">
                                Tops
                            </a>
                        </li>

                    </ul>
                </div>

                <div>
                    <p id="women-accessories-heading-mobile" class="font-semibold text-gray-900">
                    Accessories
                    </p>
                    <ul role="list" aria-labelledby="women-accessories-heading-mobile" class="mt-6 flex flex-col space-y-6">
                        <li class="flow-root">
                            <a href="#" class="-m-2 p-2 block text-gray-500">
                                Watches
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p id="women-brands-heading-mobile" class="font-semibold text-gray-900">
                    Brands
                    </p>
                    <ul role="list" aria-labelledby="women-brands-heading-mobile" class="mt-6 flex flex-col space-y-6">
                        <li class="flow-root">
                            <a href="#" class="-m-2 p-2 block text-gray-500">
                                Full Nelson
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 'Men' tab panel, show/hide based on tab state. -->
            <div id="tabs-1-panel-2" class="pt-10 pb-8 px-4 space-y-10" aria-labelledby="tabs-1-tab-2" role="tabpanel" tabindex="0">
                <div class="grid grid-cols-2 gap-x-4">
                    <div class="group relative text-sm">
                        <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                            <img src="https://tailwindui.com/img/ecommerce-images/product-page-04-detail-product-shot-01.jpg" alt="Drawstring top with elastic loop closure and textured interior padding." class="object-center object-cover">
                        </div>
                        <a href="#" class="mt-6 block font-semibold text-gray-900">
                            <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                            New Arrivals
                        </a>
                        <p aria-hidden="true" class="mt-1">Shop now</p>
                    </div>

                    <div class="group relative text-sm">
                        <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-06.jpg" alt="Three shirts in gray, white, and blue arranged on table with same line drawing of hands and shapes overlapping on front of shirt." class="object-center object-cover">
                        </div>
                        <a href="#" class="mt-6 block font-semibold text-gray-900">
                            <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                            Artwork Tees
                        </a>
                        <p aria-hidden="true" class="mt-1">Shop now</p>
                    </div>
                </div>

                <div>
                    <p id="men-clothing-heading-mobile" class="font-semibold text-gray-900">
                    Clothing
                    </p>
                    <ul role="list" aria-labelledby="men-clothing-heading-mobile" class="mt-6 flex flex-col space-y-6">
                        <li class="flow-root">
                            <a href="#" class="-m-2 p-2 block text-gray-500">
                                Tops
                            </a>
                        </li>

                        <li class="flow-root">
                            <a href="#" class="-m-2 p-2 block text-gray-500">
                                Pants
                            </a>
                        </li>

                        <li class="flow-root">
                            <a href="#" class="-m-2 p-2 block text-gray-500">
                                Sweaters
                            </a>
                        </li>

                        <li class="flow-root">
                            <a href="#" class="-m-2 p-2 block text-gray-500">
                                T-Shirts
                            </a>
                        </li>

                        <li class="flow-root">
                            <a href="#" class="-m-2 p-2 block text-gray-500">
                                Jackets
                            </a>
                        </li>

                        <li class="flow-root">
                            <a href="#" class="-m-2 p-2 block text-gray-500">
                                Activewear
                            </a>
                        </li>

                        <li class="flow-root">
                            <a href="#" class="-m-2 p-2 block text-gray-500">
                                Browse All
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p id="men-accessories-heading-mobile" class="font-semibold text-gray-900">
                    Accessories
                    </p>
                    <ul role="list" aria-labelledby="men-accessories-heading-mobile" class="mt-6 flex flex-col space-y-6">
                        <li class="flow-root">
                            <a href="#" class="-m-2 p-2 block text-gray-500">
                                Watches
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p id="men-brands-heading-mobile" class="font-semibold text-gray-900">
                    Brands
                    </p>
                    <ul role="list" aria-labelledby="men-brands-heading-mobile" class="mt-6 flex flex-col space-y-6">
                        <li class="flow-root">
                            <a href="#" class="-m-2 p-2 block text-gray-500">
                                Re-Arranged
                            </a>
                        </li>

                        <li class="flow-root">
                            <a href="#" class="-m-2 p-2 block text-gray-500">
                                Counterfeit
                            </a>
                        </li>

                        <li class="flow-root">
                            <a href="#" class="-m-2 p-2 block text-gray-500">
                                Full Nelson
                            </a>
                        </li>

                        <li class="flow-root">
                            <a href="#" class="-m-2 p-2 block text-gray-500">
                                My Way
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="border-t border-primary-dark py-6 px-4 space-y-6">
            <div class="flow-root">
                <a href="#" class="-m-2 p-2 block font-semibold text-gray-900">Company</a>
            </div>

            <div class="flow-root">
                <a href="#" class="-m-2 p-2 block font-semibold text-gray-900">Stores</a>
            </div>
        </div>

        <div class="border-t border-primary-dark py-6 px-4 space-y-6">
            <div class="flow-root">
                <a href="#" class="-m-2 p-2 block font-semibold text-gray-900">Sign in</a>
            </div>
            <div class="flow-root">
                <a href="#" class="-m-2 p-2 block font-semibold text-gray-900">Create account</a>
            </div>
        </div>

        <div class="border-t border-primary-dark py-6 px-4">
            <a href="#" class="-m-2 p-2 flex items-center">
                <img src="https://tailwindui.com/img/flags/flag-canada.svg" alt="" class="w-5 h-auto block flex-shrink-0">
                <span class="ml-3 block text-base font-semibold text-gray-900">
                    CAD
                </span>
                <span class="sr-only">, change currency</span>
            </a>
        </div>
    </div>
</div>
