@include('shared.html')

@include('shared.head', ['title' => 'Create new offer'])

<body class="bg-gray-50 h-dvh">
<!-- navbar -->
@include('shared.navbar')

<!-- Edit form -->
@include('shared.validation-error')
<div class="w-full">
    <form method="POST" action="{{ route('offer.store', ['user_id', Auth::user()->id] ) }}" enctype="multipart/form-data">
    @csrf
    @method('POST')

        <div class="flex flex-col md:flex-row justify-between m-0">
            <!-- artist -->
            <div class="m-7 basis-1/3">
                <h1 class="text-xl text-center font-extrabold">Artist</h1>
                <div class="mb-5">
                    <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">Artist First Name</label>
                    <input type="text" name="name" id="name" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('name') }}" required>
                </div>
                <div class="mb-5">
                    <label for="surname" class="block text-sm font-medium text-gray-900 dark:text-white">Artist  Surname</label>
                    <input type="text" name="surname" id="surname" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('surname') }}" required>
                </div>
            </div>
            <!-- artwork -->
            <div class="m-7 basis-1/3">
                <h1 class="text-xl text-center font-extrabold">Artwork</h1>
                <div class="mb-5">
                    <label for="title" class="block text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input value="{{ old('title') }}" required type="text" name="title" id="title" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload artwork file</label>
                    <input value="{{ old('file_input') }}" name="file_input" class="block  w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG</p>
                </div>
                <div class="mb-5">
                    <label for="form" class="block text-sm font-medium text-gray-900 dark:text-white">Select a form</label>
                    <select id="form" name="form" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a form</option>
                        <option value="painting">Painting</option>
                        <option value="sculpture">Sculpture</option>
                        <option value="drawing">Drawing</option>
                        <option value="photography">Photography</option>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="medium" class="block text-sm font-medium text-gray-900 dark:text-white">Select a medium</label>
                    <select id="medium" name="medium" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a medium</option>
                        <option value="pencil">Pencil</option>
                        <option value="ink">Ink</option>
                        <option value="chalk">Chalk</option>
                        <option value="oil">Oil</option>
                        <option value="tempera">Tempera</option>
                        <option value="watercolor">Watercolor</option>
                        <option value="acrylic">Acrylic</option>
                        <option value="bronze">Bronze</option>
                        <option value="marble">Marble</option>
                        <option value="wood">Wood</option>
                        <option value="metal">Metal</option>
                        <option value="digital">Digital</option>
                        <option value="film">Film</option>
                        <option value="mixed">Mixed</option>
                        <option value="temporary">Temporary</option>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="size" class="block text-sm font-medium text-gray-900 dark:text-white">Describe the size</label>
                    <input value="{{ old('size') }}" required type="text" name="size" id="size" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <label for="certificate" class="block text-sm font-medium text-gray-900 dark:text-white">Certificate?</label>
                <div class="flex flex-row mb-5">
                    <a class="basis-1/2">
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bordered-radio-1" type="radio" value="0" name="certificate" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">No</label>
                        </div>
                    </a>
                    <a class="basis-1/2">
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input checked id="bordered-radio-2" type="radio" value="1" name="certificate" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Yes</label>
                        </div>
                    </a>
                </div>
                <label for="signature" class="block text-sm font-medium text-gray-900 dark:text-white">Signature?</label>
                <div class="flex flex-row mb-5">
                    <a class="basis-1/2">
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bordered-radio-3" type="radio" value="0" name="signature" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-3" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">No</label>
                        </div>
                    </a>
                    <a class="basis-1/2">
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input checked id="bordered-radio-4" type="radio" value="1" name="signature" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-4" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Yes</label>
                        </div>
                    </a>

                </div>
                <div class="flex justify-center">
                    <button type="submit" class="text-white bg-gray-800 hover:bg-gray-700 w-1/2 focus:ring-4 focus:outline-none focus:ring-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </div>
            </div>
            <!-- offer -->
            <div class="m-7 basis-1/3">
                <h1 class="text-xl text-center font-extrabold">Offer</h1>
                <div class="mb-5">
                    <label for="price" class="block text-sm font-medium text-gray-900 dark:text-white">Price</label>
                    <input value="{{ old('price') }}" required type="number" name="price" id="price" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-5 flex flex-row justify-around">
                    <a class="basis-1/2">
                    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                        <input id="option-status-1" type="radio" value="active" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="option-status-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active</label>
                    </div>
                    </a>
                    <a class="basis-1/2">
                    <div class="basis-1/2 flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                        <input checked id="option-status-2" type="radio" value="inactive" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="option-status-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Inactive</label>
                    </div>
                    </a>
                </div>
                <div class="mb-5">
                    <label for="description" class="block text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea required minlength="10" id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('description') }}</textarea>
                </div>
            </div>
        </div>

    </form>
</div>

</body>
</html>
