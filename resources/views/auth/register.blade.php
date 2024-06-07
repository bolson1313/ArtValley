@include('shared.html')

@include('shared.head', ['title' => 'Register'])

<body class="bg-gray-50 ">
@include('shared.navbar')
<!-- Register Form -->
<div class="flex flex-col justify-center content-center items-center h-5/6 mb-5">
    <div
        class="w-full max-w-sm p-4 mt-5 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">

        @include('shared.validation-error')

        @include('shared.session-error')

        <form class="space-y-6" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Sign up to Art Valley</h5>
            <div>
                <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" name="name" id="name"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                       placeholder="John" value="{{ old('name') }}" required autocomplete="name" autofocus minlength="5"/>

                <label for="surname" class="block text-sm font-medium text-gray-900 dark:text-white">Surname</label>
                <input type="text" name="surname" id="surname"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                       placeholder="Brown" value="{{ old('surname') }}" required autocomplete="surname" autofocus minlength="5"/>

                <label for="nickname" class="block text-sm font-medium text-gray-900 dark:text-white">Nickname</label>
                <input type="text" name="nickname" id="nickname"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                       placeholder="johnb123" value="{{ old('nickname') }}" required autocomplete="nickname" autofocus/>

                <label class="block text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload avatar
                    file</label>
                <input name="file_input"
                       class="block  w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                       aria-describedby="file_input_help" id="file_input" type="file">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG, JPEG</p>

                <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                <input type="email" name="email" id="email"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                       placeholder="name@company.com" value="{{ old('email') }}" required autocomplete="email"/>

                <label for="password" class="block text-sm font-medium text-gray-900 dark:text-white">Your
                    password</label>
                <input type="password" name="password" id="password" placeholder="••••••••"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                       required autocomplete="new-password" minlength="8" "/>

                <label for="password-confirm" class="block text-sm font-medium text-gray-900 dark:text-white">Confirm
                    your password</label>
                <input type="password" name="password_confirmation" id="password-confirm"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                       required autocomplete="new-password" minlength="8"/>
            </div>
            <button type="submit"
                    class="w-full text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Register your account!
            </button>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                Registered? <a href="{{ route('login') }}" class="text-blue-700 hover:underline dark:text-blue-500">Sign
                    in</a>
            </div>
        </form>
    </div>
</div>


</body>
</html>

