@include('shared.html')

@include('shared.head', ['title' => 'Your Offers'])

<body class="bg-gray-50 h-dvh flex flex-col justify-start ">
<!-- navbar -->
@include('shared.navbar')

<div class="m-5 flex justify-center">
    <a href="{{ route('offer.create') }}" class="max-w-32 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Add new offer
    </a>
</div>

<!-- User offers -->
<div class="relative overflow-x-auto shadow-md sm:rounded-lg m-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-800 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Title
            </th>
            <th scope="col" class="px-6 py-3">
                Author
            </th>
            <th scope="col" class="px-6 py-3">
                Description
            </th>
            <th scope="col" class="px-6 py-3">
                Price
            </th>
            <th scope="col" class="px-6 py-3">
                Status
            </th>
            <th scope="col" class="px-6 py-3">
                Created At
            </th>
            <th scope="col" class="px-6 py-3">
                <span class="sr-only">Edit</span>
            </th>
            <th scope="col" class="px-6 py-3">
                <span class="sr-only">Remove</span>
            </th>
            <th scope="col" class="px-6 py-3">
                <span class="sr-only">GoTo</span>
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($offers as $offer)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $offer->artwork->title }}
            </th>
            <td class="px-6 py-4">
                {{ $offer->artwork->artist->name }} {{ $offer->artwork->artist->surname }}
            </td>
            <td class="px-6 py-4">
                {{ $offer->description }}
            </td>
            <td class="px-6 py-4">
                {{ $offer->price }}
            </td>
            <td class="px-6 py-4">
                {{ $offer->status }}
            </td>
            <td class="px-6 py-4">
                {{ $offer->created_at }}
            </td>
            <td class="px-6 py-4">
                <a href="{{ route('offer.edit',['offer_id'=>$offer->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
            </td>
            <form method="POST" action="{{ route('offer.destroy', $offer) }}">
                @csrf
                @method('DELETE')
                <td class="px-6 py-4">
                    <button type="submit"><span class="font-medium text-red-600 dark:text-blue-500 hover:underline">Remove</span></button>
                </td>
            </form>
            <td class="px-6 py-4">
                <a href="{{ route('offer.show',['id' => $offer->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Go To</a>
            </td>
        </tr>
        @empty
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th colspan="9" class="px-6 py-4 font-bold text-xl text-center text-gray-900 whitespace-nowrap dark:text-white">
                    You have no active or inactive offers! Create one!
                </th>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
