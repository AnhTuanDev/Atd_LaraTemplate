<x-shop.layouts.app>

    <div class="content mt-8 md:mt-12">
        <div class="max-w-7xl mx-auto">
            <header class="p-6 md:p-8">
                <h1 class="max-w-5xl mx-auto text-2xl md:text-3xl font-semibold text-center capitalize">
                    {{ $page['title']}}
                </h1>
                <div class="mt-6 md:mt-8 text-sm break-words max-w-5xl mx-auto rounded-lg shadow-lg p-8 ring-1 ring-primary-main">
                    {{ $page['description']}}
                </div>
                <article>
                </article>
            </header>

            <article class="p-6 md:p-8 mt-6 md:mt10">
                <div class="text-sm break-words max-w-5xl mx-auto rounded-lg shadow-lg p-8 ring-1 ring-primary-main">
                    {{ $page['content']}}
                </div>
            </article>

        </div>
    </div>

</x-shop.layouts.app>
