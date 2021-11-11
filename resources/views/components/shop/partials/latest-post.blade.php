@props([ 'title' => 'latest'])
<section>
    <div class="max-w-7xl px-4 pt-8 md:py-12 mx-auto">
        <x-shop.partials.latest-header 
            class="border-primary-dark"
            :title="$title" 
            titleClass="capitalize text-secondary-dark" />

        <div class="grid grid-cols-1 md:gap-6 lg:gap-10 lg:gap-24 lg:grid-cols-2">
            <div class="bt-8 md:pt-12 xl:pt-24">
                <div class="space-y-8 lg:divide-y lg:divide-gray-100">
                    <div class="pt-8 sm:flex lg:items-start group">
                        <div class="flex-shrink-0 mb-4 sm:mb-0 sm:mr-4">
                            <img class="w-full rounded-md sm:h-32 sm:w-32" src="https://images.unsplash.com/photo-1558865869-c93f6f8482af?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1101&amp;q=80" alt="text">
                        </div>
                        <div>
                            <span class="text-sm text-gray-300">August 20.20.21</span>
                            <p class="mt-3 text-lg font-medium leading-6">
                            <a href="./blog-post.html" class="
                                     text-xl text-neutral-600
                                     lg:text-2xl
                                     hopver:text-gray-300
                                     ">B2B Branding: 5 tips to go from boring to extraordinary </a>
                            </p>
                            <p class="mt-2 text-lg text-magnesium"> A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. </p>
                        </div>
                    </div>
                    <div class="pt-8 sm:flex lg:items-start group">
                        <div class="flex-shrink-0 mb-4 sm:mb-0 sm:mr-4">
                            <img class="w-full rounded-md sm:h-32 sm:w-32" src="https://images.unsplash.com/photo-1623122245120-7eef6faa39c6?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mjh8fG9mZmljZXxlbnwwfDJ8MHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=900&amp;q=60" alt="text">
                        </div>
                        <div>
                            <span class="text-sm text-gray-300">August 20.20.21</span>
                            <p class="mt-3 text-lg font-medium leading-6">
                            <a href="./blog-post.html" class="
                                     text-xl text-neutral-600
                                     lg:text-2xl
                                     hopver:text-gray-300
                                     ">Building a Career in Character Design: A chat with Sarah Beth Morgan </a>
                            </p>
                            <p class="mt-2 text-lg text-magnesium"> A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:pt-24">
                <div class="space-y-8 lg:divide-y lg:divide-gray-300">
                    <div class="pt-8 sm:flex lg:items-start group">
                        <div class="flex-shrink-0 mb-4 sm:mb-0 sm:mr-4">
                            <img class="w-full rounded-md sm:h-32 sm:w-32" src="https://cdn.dribbble.com/uploads/28096/original/29bfe0a864e0f387e407a3cbfc03794c.png?1632770650" alt="text">
                        </div>
                        <div>
                            <span class="text-sm text-gray-300">August 20.20.21</span>
                            <p class="mt-3 text-lg font-medium leading-6">
                            <a href="./blog-post.html" class="
                                     text-xl text-neutral-600
                                     lg:text-2xl
                                     hopver:text-gray-300
                                     ">12 Graphic Design Skills You Need To Get Hired (&amp; How to Develop Them) </a>
                            </p>
                            <p class="mt-2 text-lg text-magnesium"> A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. </p>
                        </div>
                    </div>
                    <div class="pt-8 sm:flex lg:items-start group">
                        <div class="flex-shrink-0 mb-4 sm:mb-0 sm:mr-4">
                            <img class="w-full rounded-md sm:h-32 sm:w-32" src="https://cdn.dribbble.com/users/1804127/screenshots/10765172/workflow-01.png" alt="text">
                        </div>
                        <div>
                            <span class="text-sm text-gray-300">August 20.20.21</span>
                            <p class="mt-3 text-lg font-medium leading-6">
                            <a href="./blog-post.html" class="
                                     text-xl text-neutral-600
                                     lg:text-2xl
                                     hopver:text-gray-300
                                     ">Meet Now What? The essential new podcast for evolving designers </a>
                            </p>
                            <p class="mt-2 text-lg text-magnesium"> A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

