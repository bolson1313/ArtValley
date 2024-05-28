@include('shared.html')

@include('shared.head', ['title' => 'Offers'])

<body class="bg-gray-50 h-dvh">

@include('shared.adminpanel')

<div class="p-4 sm:ml-64">


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <h5 class="text-xl font-medium text-center text-gray-900 dark:text-white">Offers</h5>

        <div class="text-sm font-medium text-gray-500 dark:text-gray-300 text-center">
            <a href="{{ route('admin.offerNew') }}" class="text-blue-700 hover:underline dark:text-blue-500">Create new Offer</a>
        </div>
        <div class="text-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <span class="font-medium">Info alert!</span> If u delete offer it will automatically delete related Transaction record!
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                @if(isset($offers) && count($offers) > 0)
                    @foreach(array_keys($offers[0]->attributesToArray()) as $key)
                        <th scope="col" class="px-6 py-3">
                            {{ ucfirst(str_replace('_', ' ', $key)) }}
                        </th>
                    @endforeach
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                @else
                    <th scope="col" class="px-6 py-3">
                        No Data Available
                    </th>
                @endif
            </tr>
            </thead>
            <tbody>
            @forelse($offers as $offer)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    @foreach($offer->attributesToArray() as $value)
                        <td class="px-6 py-4">
                            @if($value == null)
                                {{ str_replace('_', ' ', 'null') }}
                            @else
                                {{ $value }}
                            @endif
                        </td>
                    @endforeach

                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.offerEdit', ['offer'=>$offer]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                    <form method="POST" action="{{ route('admin.offerDelete', $offer) }}">
                        @csrf
                        @method('DELETE')
                        <td class="px-6 py-4 text-right">
                            <button type="submit" class="font-medium text-red-600 dark:text-blue-500 hover:underline">Remove</button>
                        </td>
                    </form>

                </tr>
            @empty
                <tr>
                    <td colspan="100%" class="px-6 py-4 text-center">
                        No data to display
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

</div>


</body>
</html>
