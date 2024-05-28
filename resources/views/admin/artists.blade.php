@include('shared.html')

@include('shared.head', ['title' => 'Artists'])

<body class="bg-gray-50 h-dvh">

@include('shared.adminpanel')

<div class="p-4 sm:ml-64">


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <h5 class="text-xl font-medium text-center text-gray-900 dark:text-white">Artists</h5>

        <div class="text-sm font-medium text-gray-500 dark:text-gray-300 text-center">
            <a href="{{ route('admin.artistNew') }}" class="text-blue-700 hover:underline dark:text-blue-500">Create new Artist</a>
        </div>
        <div class="text-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <span class="font-medium">Info alert!</span> If u delete artist it will automatically delete related Artwork, Offer and Transaction records!
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                @if(isset($artists) && count($artists) > 0)
                    @foreach(array_keys($artists[0]->attributesToArray()) as $key)
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
            @forelse($artists as $artist)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    @foreach($artist->attributesToArray() as $value)
                        <td class="px-6 py-4">
                            @if($value == null)
                                {{ str_replace('_', ' ', 'null') }}
                            @else
                                {{ $value }}
                            @endif
                        </td>
                    @endforeach

                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.artistEdit', ['artist'=>$artist]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                        <form method="POST" action="{{ route('admin.artistDelete', $artist) }}">
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
