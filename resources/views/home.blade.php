@include('shared.html')

@include('shared.head', ['title' => 'ArtValley'])

<body  class="bg-gray-50 h-dvh flex flex-col justify-between">
    <!-- navbar -->
    @include('shared.navbar')

    <!-- carousel -->
    <section id="carousel" class="mb-10">
        <div id="indicators-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-b-lg md:h-96">
                @foreach($files as $file)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                        <img src="{{ Storage::url($file) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                @endforeach
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                @foreach($files as $index => $file)
                    <button type="button" class="w-3 h-3 rounded-full {{ $index === 0 ? 'bg-white' : 'bg-gray-300' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
                @endforeach
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
            </button>
        </div>
    </section>

    <!-- about -->
    <div class="flex flex-col justify-center items-center mb-16">
    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Few words about us</h1>
    <p class="text-justify mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Welcome to ArtValley, your premier destination for buying and selling a diverse range of artwork. Our platform connects artists with art enthusiasts from all over the world, fostering a vibrant community where creativity and commerce intersect.</p>
    <a href="{{ route('about') }}" class="max-w-32 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Read more
        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
    </a>
    </div>

    <!-- content -->
    <section id="featured" class="mb-16">
        <h1 class="pt-5 text-center text-5xl font-extrabold dark:text-white">Featured<small class="ms-2 font-semibold text-gray-500 dark:text-gray-400">Art Work</small></h1>
        <div class="flex flex-col flex-wrap p-5 gap-5 justify-center md:flex-row">
        @foreach($offers as $offer)
            <div class="basis-1/4">
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="{{ route('offer.show', ['id' => $offer->id]) }}">
                    <img class="rounded-t-lg" src="{{ Storage::url($offer->artwork->{"image-path"}) }}" alt="Offer Image" />
                </a>
                <div class="flex flex-col place-content-between p-5 h-56">
                    <a href="{{ route('offer.show', ['id' => $offer->id]) }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $offer->artwork->title }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        @php
                            $description = $offer->description;
                            if (strlen($description) > 100) {
                                $description = substr($description, 0, 100) . '...';
                            }
                        @endphp
                        {{ $description }}
                    </p>
                    <a href="{{ route('offer.show', ['id' => $offer->id]) }}" class="max-w-32 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Offer site
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            </div>
        @endforeach
        </div>
    </section>

    <!-- footer -->
    @include('shared.footer')
</body>
</html>
