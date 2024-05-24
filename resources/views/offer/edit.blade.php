@include('shared.html')

@include('shared.head', ['title' => 'Edit'])

<body class="bg-gray-50 h-dvh">
<!-- navbar -->
@include('shared.navbar')

<!-- Edit form -->
@include('shared.validation-error')
<form class="max-w-sm mx-auto" method="POST" action="{{ route('offer.update', $offer->id) }}">
    @csrf
    @method('PUT')
    <div>
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
        <input type="text" name="title" id="title" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $artwork->title }}" disabled>
    </div>
    <div>
        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
        <input type="number" name="price" id="price" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $offer->price }}">
    </div>
    <div class="flex items-center mb-4">
        <input id="option-status-1" type="radio" name="status" value="Active" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" @if($offer->status == 'active') checked @endif>
        <label for="option-status-1" class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
            Active
        </label>
    </div>
    <div class="flex items-center mb-4">
        <input id="option-status-2" type="radio" name="status" value="Inactive" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" @if($offer->status == 'inactive') checked @endif>
        <label for="option-status-2" class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
            Inactive
        </label>
    </div>
    <div>
        <div>
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $offer->description }}</textarea>
        </div>
    </div>
    <div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </div>
</form>

</body>
</html>
