@include('shared.html')

@include('shared.head', ['title' => 'Dashboard'])

<body class="bg-gray-50 h-dvh flex flex-col justify-between">
<!-- navbar -->
@include('shared.navbar')

<!-- errors -->
<div id="errors">
    @include('shared.validation-error')
    @include('shared.session-error')
</div>

@can('update', $user)
<!-- user form -->
<div class="self-center md:w-96 w-auto mx-3  flex flex-col justify-center">
    <form method="POST" action="{{ route('user.update', $user) }}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <h1 class="text-xl text-center font-extrabold">{{ $user->name }} {{ $user->surname }}</h1>
        <div class="mb-5">
            <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input value="{{ $user->name }}" required type="text" name="name" id="name" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-5">
            <label for="surname" class="block text-sm font-medium text-gray-900 dark:text-white">Surname</label>
            <input value="{{ $user->surname }}" required type="text" name="surname" id="surname" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-5">
            <label for="nickname" class="block text-sm font-medium text-gray-900 dark:text-white">Nickname</label>
            <input value="{{ $user->nickname }}" required type="text" name="nickname" id="nickname" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-5">
            <label class="block text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload avatar file</label>
            <input name="file_input" class="block  w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG, JPEG</p>
        </div>
        <div class="mb-5">
            <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input value="{{ $user->email }}" required type="email" name="email" id="email" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-5">
            <label for="password" class="block text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input  required type="password" placeholder="••••••••" name="password" id="password" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-5">
            <label for="password-confirm" class="block text-sm font-medium text-gray-900 dark:text-white">Confirm your password</label>
            <input type="password" name="password_confirmation" id="password-confirm" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required autocomplete="new-password"/>
        </div>
        <div class="flex justify-center">
            <button type="submit" class="text-white bg-gray-800 hover:bg-gray-700 w-1/2 focus:ring-4 focus:outline-none focus:ring-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </div>
    </form>
</div>
@endcan

<!-- footer -->
@include('shared.footer')
</body>
</html>
