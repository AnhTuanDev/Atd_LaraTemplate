<div class="content">

    <div class="max-w-7xl mx-auto">


        <div class="grid grid-cols-12 gap-6 my-8">

            <div class="w-full md:col-span-7">

                <div x-data="{ show: 0 }"
                    class="flex w-full">
                    <!-- Danh sach image --> 
                    <div class="flex flex-col space-y-2">
                        @foreach($photos as $index => $img)
                        
                        <img @click="show = {{ $index }}"
                                class="w-14 object-cover object-center rounded" src="{{ $img->url() }}" alt="">
                        
                        @endforeach
                    </div>

                    <!-- Acive image --> 
                    <div class="flex-1 md:ml-2">
                        @foreach($photos as $index => $img)
                        
                            <img x-show=" show  === {{ $index }} "
                                class="w-full object-container object-center rounded" src="{{ $img->url() }}" alt="">
                        
                        @endforeach
                    </div>

                </div>

            </div>

            <!-- Product Detail -->
            <div class="col-span-5">

                <h2 class="text-xl font-semibold"> {{$product->name}} </h2>

                <div class="w-full flex bg-secondary-light rounded-lg shadow-lg mt-4">
                    <div class="w-full flex items-center p-2 justify-between">
                        @if($product->discount < 1)
                        <label for="discount" class="font-semibold text-lg mr-4 text-secondary-text">{{ $product->price}} đ</label>
                        @else
                            <label for="discount" class="font-semibold text-lg mr-4 text-secondary-text">{{ $product->discount}}</label>
                            <label for="price" class="line-through text-secondary-dark text-base">{{ $product->price}}</label>
                        @endif
                    </div>
                </div>

                <div class="w-full flex bg-secondary-light rounded-lg shadow-lg mt-4">
                    <div class="w-full flex items-center p-2 justify-between">
                        @if($product->discount < 1)
                        <label for="discount" class="font-semibold text-lg mr-4 text-secondary-text">{{ $product->price}} đ</label>
                        @else
                            <label for="discount" class="font-semibold text-lg mr-4 text-secondary-text">{{ $product->discount}}</label>
                            <label for="price" class="line-through text-secondary-dark text-base">{{ $product->price}}</label>
                        @endif
                    </div>
                </div>

                <div class="text-main-text font-sm mt-6">
                    {!! $product->description !!}
                </div>

            </div>

        </div>
    
    </div>
</div>
