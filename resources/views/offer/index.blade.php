@include('shared.html')

@include('shared.head', ['title'=>'Offers'])

    <body class="bg-gray-50 h-dvh flex flex-col justify-between">
    @include('shared.navbar')


    <div class="flex flex-row justify-center py-4 md:py-8 flex-wrap">
        <a href="{{ url('/offers') }}" class="
    text-base font-medium px-5 py-2.5 text-center me-3 mb-3 rounded-full
    @if(!str_contains(request()->fullUrl(), 'form'))
        text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800
    @else
        text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 dark:text-white dark:focus:ring-gray-800
    @endif
">All Forms</a>
        </a>
        <a href="{{ url('/offers?form=painting') }}" class="
        text-base font-medium px-5 py-2.5 text-center me-3 mb-3 rounded-full
        @if(str_contains(request()->fullUrl(), 'painting'))
        text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800
        @else
        text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 dark:text-white dark:focus:ring-gray-800
        @endif
        ">
            Painting
        </a>
        <a href="{{ url('/offers?form=sculpture') }}" class="
        text-base font-medium px-5 py-2.5 text-center me-3 mb-3 rounded-full
        @if(str_contains(request()->fullUrl(), 'sculpture'))
        text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800
        @else
        text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 dark:text-white dark:focus:ring-gray-800
        @endif
        ">
            Sculpture
        </a>
        <a href="{{ url('/offers?form=drawing') }}" class="
        text-base font-medium px-5 py-2.5 text-center me-3 mb-3 rounded-full
        @if(str_contains(request()->fullUrl(), 'drawing'))
        text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800
        @else
        text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 dark:text-white dark:focus:ring-gray-800
        @endif
        ">
            Drawing
        </a>
        <a href="{{ url('/offers?form=photography') }}" class="
        text-base font-medium px-5 py-2.5 text-center me-3 mb-3 rounded-full
        @if(str_contains(request()->fullUrl(), 'photography'))
        text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800
        @else
        text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 dark:text-white dark:focus:ring-gray-800
        @endif
        ">
            Photography
        </a>
    </div>
    <div class="grow grid grid-cols-1 md:grid-cols-3 gap-4 md:ml-5 md:mr-5 mb-20 m-5 justify-items-center">
        @forelse($offers as $offer)
        <div>
            <figure class="relative transition-all duration-300 rounded-lg">
                <a href="{{ route('offer.show', ['id' => $offer->id]) }}" class="md:min-w-full min-w-full flex justify-center rounded-lg">
                    <img class="md:max-h-[400px] rounded-lg transition-all duration-300 blur-none hover:blur-sm" src="{{ Storage::url($offer->artwork->{'image'}) }}" alt="">
                </a>
                <figcaption class="bg-gray-200 absolute bottom-6 px-4 text-lg text-black z-10 w-full text-center rounded-xl">
                    <p>{{ $offer->artwork->title }}</p>
                </figcaption>
            </figure>
        </div>
        @empty
                    <div class=" md:col-start-1 md:col-end-4 w-full h-full justify-self-center">
                        <h1 class="md:ml-5 m-0 md:mr-5 max-w-full mt-5 md:text-4xl text-2xl font-extrabold dark:text-white text-center">No available offers in that category!</h1>
                    </div>
        @endforelse
    </div>



    @include('shared.footer')
    </body>
</html>
