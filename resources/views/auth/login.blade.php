@include('shared.html')

@include('shared.head', ['title' => 'Login'])

<body  class="bg-gray-50 h-dvh flex flex-col justify-between">
@include('shared.navbar')
<!-- Login Form -->
<div class="flex flex-col justify-center content-center items-center h-3/4">
<img class="rounded-full size-16 mb-9" src="{{ asset('storage/img/icons/mandala.png') }}" alt="logo">
    <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">

        @include('shared.validation-error')

        @include('shared.session-error')

        <form class="space-y-6" action="{{ route('login.authenticate') }}" method="POST">
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Sign in to  Art Valley</h5>
            @csrf
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" value="{{ old('email') }}" required />
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required minlength="8" maxlength="20"/>
            </div>
            <button type="submit" class="w-full text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                Not registered? <a href="{{ route('register') }}" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
            </div>
        </form>
    </div>
</div>

<!-- footer -->
@include('shared.footer')
</body>
</html>

