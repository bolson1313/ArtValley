@include('shared.html')

@include('shared.head', ['title' => 'Edit user'])

<body class="bg-gray-50 h-dvh">

@include('shared.adminpanel')

<div class="p-4 sm:ml-64 flex justify-center center">
    <div class="md:w-1/2">


        @include('shared.validation-error')

        @include('shared.session-error')

        <form class="space-y-6" action="{{ route('admin.usersUpdate', ['user_input'=>$user]) }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('POST')
            <h5 class="text-xl font-medium text-center text-gray-900 dark:text-white">Edit user</h5>
            <div>
                <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" name="name" id="name"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                       value="{{ $user->name }}" required autofocus/>

                <label for="surname" class="block text-sm font-medium text-gray-900 dark:text-white">Surname</label>
                <input type="text" name="surname" id="surname"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                       value="{{ $user->surname }}" required autofocus/>

                <label for="nickname" class="block text-sm font-medium text-gray-900 dark:text-white">Nickname</label>
                <input type="text" name="nickname" id="nickname"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                       value="{{ $user->nickname }}" required autofocus/>

                <label class="block text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload avatar
                    file</label>
                <input name="file_input"
                       class="block  w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                       aria-describedby="file_input_help" id="file_input" type="file">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG, JPEG</p>

                <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" name="email" id="email"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                       value="{{ $user->email }}" required/>

                <div class="flex flex-row mb-5 mt-5">
                    <a class="basis-1/2">
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input @if($user->role == 'admin')
                                       {{ 'checked' }}
                                   @endif id="bordered-radio-1" type="radio" value="admin" name="role"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-1"
                                   class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Admin</label>
                        </div>
                    </a>
                    <a class="basis-1/2">
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input @if($user->role == 'user')
                                       {{ 'checked' }}
                                   @endif id="bordered-radio-2" type="radio" value="user" name="role"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-2"
                                   class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">User</label>
                        </div>
                    </a>
                </div>

                <label for="password" class="block text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" name="password" id="password" placeholder="••••••••"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"/>

            </div>
            <button type="submit"
                    class="w-full text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Save changes
            </button>
        </form>
    </div>
</div>


</body>
</html>
