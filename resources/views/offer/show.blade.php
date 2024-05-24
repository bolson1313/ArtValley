@include('shared.html')

@include('shared.head', ['title'=>$offer->artwork->title])

<body class="bg-gray-50 w-full h-dvh">
@include('shared.navbar')

<!-- art -->
<div class="flex flex-col m-10 max-w-full flex-wrap md:m-24 md:flex-row">
    <div class="basis-1/2 flex self-center justify-center">
        <img class="h-auto w-auto max-h-[595px] max-w-[640px]" src="{{ Storage::url($offer->artwork->{'image'}) }}" alt="{{ $offer->artwork->title }}">
    </div>
    <div class="basis-1/2 flex flex-col md:flex-row flex-wrap w-full">
        <h1 class="md:ml-5 m-0 md:mr-5 max-w-full mt-5 md:text-5xl text-3xl font-extrabold dark:text-white">{{ $offer->artwork->title }}<br><small class="ms-2 font-semibold text-gray-500 dark:text-gray-400">{{ $offer->artwork->artist->name }} {{ $offer->artwork->artist->surname }}</small></h1>


        <div class="flex md:flex-row flex-col items-center md:justify-around md:ml-5 md:mr-5 m-0 mt-10 w-full">
            <span class="text-center w-32 mb-5 mt-5 md:text-3xl text-xl font-bold dark:text-white">Price</span>

            <button type="button" class="h-8 w-32 md:h-12 text-white {{ $offer->status == 'inactive' || $offer->status == 'closed' ? 'bg-gray-200' : 'bg-gray-700 hover:bg-gray-800' }} focus:ring-4 focus:outline-none focus:ring-gray-500 font-medium rounded-lg md:text-sm text-xs px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" {{ $offer->status == 'inactive' || $offer->status == 'closed' ? 'disabled' : '' }}>
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                    <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                </svg>
                Buy now
            </button>

            <span class="text-center w-32 mb-5 mt-5 md:text-3xl text-xl font-bold dark:text-white ">{{ $offer->price }}$</span>
        </div>



        <div id="tabs" class="md:ml-5 w-full text-sm font-medium text-center text-gray-500 border-b-2 border-gray-200 dark:text-gray-400 dark:border-gray-700">
            <ul class="flex flex-row justify-center -mb-px">
                <li class="me-2">
                    <button
                        id="description-btn"
                        class="basis-1/2 inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">
                        Description
                    </button>
                </li>
                <li class="me-2">
                    <button
                        id="info-btn"
                        class="basis-1/2 inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">
                        More Info
                    </button>
                </li>
            </ul>
        </div>
        <div class="hidden mt-2 p-5 md:h-72 h-auto md:overflow-auto w-full" id="description-content">
            <p class="text-gray-500 text-2xl dark:text-gray-400">{{ $offer->description }}</p>
        </div>
        <div class="hidden mt-2 p-5 md:h-72 h-auto md:overflow-auto w-full" id="info-content">
            <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                <div class="flex flex-col pb-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Artist</dt>
                    <dd class="text-lg font-semibold">{{ $offer->artwork->artist->name }} {{ $offer->artwork->artist->surname }}</dd>
                </div>
                <div class="flex flex-col pb-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Title</dt>
                    <dd class="text-lg font-semibold">{{ $offer->artwork->title }}</dd>
                </div>
                <div class="flex flex-col pb-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Art Form</dt>
                    <dd class="text-lg font-semibold">{{ $offer->artwork->form }}</dd>
                </div>
                <div class="flex flex-col pb-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Art Medium</dt>
                    <dd class="text-lg font-semibold">{{ $offer->artwork->medium }}</dd>
                </div>
                <div class="flex flex-col pb-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Size</dt>
                    <dd class="text-lg font-semibold">{{ $offer->artwork->size }}</dd>
                </div>
                <div class="flex flex-col pb-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Authentication certificate</dt>
                    <dd class="text-lg font-semibold">@if($offer->artwork->certificate) Yes @else No @endif</dd>
                </div>
                <div class="flex flex-col pb-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Author signature</dt>
                    <dd class="text-lg font-semibold">@if($offer->artwork->signature) Yes @else No @endif</dd>
                </div>
            </dl>

        </div>

    </div>
</div>


@include('shared.footer')
</body>
</html>
