@include('shared.html')

@include('shared.head', ['title'=>'Offers'])

    <body class="bg-gray-50 h-dvh flex flex-col justify-between">
    @include('shared.navbar')




    <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
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
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 ml-5 mr-5 mb-20">
        @foreach($offers as $offer)
        <div>
            <figure class="relative transition-all duration-300 rounded-lg">
                <a href="{{ route('offer.show', ['id' => $offer->id]) }}">
                    <img class="rounded-lg transition-all duration-300 blur-none hover:blur-sm" src="{{ Storage::url($offer->artwork->{'image'}) }}" alt="">
                </a>
                <figcaption class="absolute bottom-6 px-4 text-lg text-white z-10">
                    <p>{{ $offer->artwork->title }}</p>
                </figcaption>
            </figure>
        </div>

        @endforeach
    </div>


    @include('shared.footer')
    </body>
</html>
