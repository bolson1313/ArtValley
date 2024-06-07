@include('shared.html')

@include('shared.head', ['title' => 'New artist'])

<body class="bg-gray-50 h-dvh">

@include('shared.adminpanel')

<div class="p-4 sm:ml-64 flex justify-center center">
    <div class="md:w-1/2">


        @include('shared.validation-error')

        @include('shared.session-error')

        <form class="space-y-6" action="{{ route('admin.artistCreate') }}" method="POST">
            @csrf
            @method('POST')
            <h5 class="text-xl font-medium text-center text-gray-900 dark:text-white">Create new Artist</h5>
            <div>
                <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="John" value="{{ old('name') }}"
                       required autocomplete="name" autofocus minlength="5"/>

                <label for="surname" class="block text-sm font-medium text-gray-900 dark:text-white">Surname</label>
                <input type="text" name="surname" id="surname"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                       placeholder="Brown" value="{{ old('surname') }}" autocomplete="surname" autofocus/>

            </div>
            <button type="submit"
                    class="w-full text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Create new artist
            </button>
        </form>
    </div>
</div>


</body>
</html>
