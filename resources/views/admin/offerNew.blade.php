@include('shared.html')

@include('shared.head', ['title' => 'New Offer'])

<body class="bg-gray-50 h-dvh">

@include('shared.adminpanel')

<div class="p-4 sm:ml-64 flex justify-center center">
    <div class="md:w-1/2">

        @include('shared.validation-error')

        @include('shared.session-error')

        <form class="space-y-6" action="{{ route('admin.offerCreate') }}" method="POST">
            @csrf
            @method('POST')
            <h5 class="text-xl font-medium text-center text-gray-900 dark:text-white">Create new Offer</h5>
            <div class="m-7 basis-1/3">
                <div class="mb-5">
                    <label for="artwork_id" class="block text-sm font-medium text-gray-900 dark:text-white">Select artwork</label>
                    <select id="artwork_id" name="artwork_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose artwork</option>
                        @foreach($artworks as $artwork)
                            <option value="{{ $artwork->id }}">{{ $artwork->id.' - '.$artwork->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-5">
                    <label for="user_id" class="block text-sm font-medium text-gray-900 dark:text-white">Select user</label>
                    <select id="user_id" name="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose user</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->id.  ' - '.$user->name. ' ' .$user->surname }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-5">
                    <label for="price" class="block text-sm font-medium text-gray-900 dark:text-white">Price</label>
                    <input value="{{ old('price') }}" min="0" required type="number" name="price" id="price" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-5">
                    <label for="description" class="block text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea required minlength="10" id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('description') }}</textarea>
                </div>
                <label for="status" class="block text-sm font-medium text-gray-900 dark:text-white">Status</label>
                <div class="flex flex-row mb-5">
                    <a class="basis-1/3">
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input checked id="bordered-radio-1" type="radio" value="active" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active</label>
                        </div>
                    </a>
                    <a class="basis-1/3">
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bordered-radio-2" type="radio" value="inactive" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Inactive</label>
                        </div>
                    </a>
                    <a class="basis-1/3">
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bordered-radio-3" type="radio" value="closed" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-3" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Closed</label>
                        </div>
                    </a>
                </div>
            </div>
            <button type="submit" class="w-full text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create new Offer</button>
        </form>
    </div>
</div>

</body>
</html>
