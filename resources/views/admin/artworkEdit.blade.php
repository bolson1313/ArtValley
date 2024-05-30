@include('shared.html')

@include('shared.head', ['title' => 'Edit Artwork'])

<body class="bg-gray-50 h-dvh">

@include('shared.adminpanel')

<div class="p-4 sm:ml-64 flex justify-center center">
    <div class="md:w-1/2">

        @include('shared.validation-error')

        @include('shared.session-error')

        <form class="space-y-6" action="{{ route('admin.artworkUpdate') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <input class="hidden" name="id" value="{{ $artwork->id }}">
            <h5 class="text-xl font-medium text-center text-gray-900 dark:text-white">Edit Artwork</h5>
            <div class="m-7 basis-1/3">
                <h1 class="text-xl text-center font-extrabold">Artwork</h1>
                <div class="mb-5">
                    <label for="artist_id" class="block text-sm font-medium text-gray-900 dark:text-white">Select
                        artist</label>
                    <select id="artist_id" name="artist_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="{{ $artwork->artist_id }}" selected>{{ $artwork->artist_id }}</option>
                        @foreach($artists as $artist)
                            <option
                                value="{{ $artist->id }}">{{$artist->id. ' - ' .$artist->name. ' ' .$artist->surname }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mb-5">
                    <label for="title" class="block text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input value="{{ $artwork->title }}" required type="text" name="title" id="title"
                           class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                        artwork file</label>
                    <input value="{{ $artwork->image }}" name="file_input"
                           class="block  w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                           aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG</p>
                </div>
                <div class="mb-5">
                    <label for="form" class="block text-sm font-medium text-gray-900 dark:text-white">Select a
                        form</label>
                    <select id="form" name="form"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="{{ $artwork->form }}" selected>{{ $artwork->form }}</option>
                        <option value="painting">Painting</option>
                        <option value="sculpture">Sculpture</option>
                        <option value="drawing">Drawing</option>
                        <option value="photography">Photography</option>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="medium" class="block text-sm font-medium text-gray-900 dark:text-white">Select a
                        medium</label>
                    <select id="medium" name="medium"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="{{ $artwork->medium }}" selected>{{ $artwork->medium }}</option>
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
                    <label for="size" class="block text-sm font-medium text-gray-900 dark:text-white">Describe the
                        size</label>
                    <input value="{{ $artwork->size }}" required type="text" name="size" id="size"
                           class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <label for="certificate"
                       class="block text-sm font-medium text-gray-900 dark:text-white">Certificate?</label>
                <div class="flex flex-row mb-5">
                    <a class="basis-1/2">
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input @if($artwork->certificate==0) checked @endif id="bordered-radio-1" type="radio"
                                   value="0" name="certificate"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-1"
                                   class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">No</label>
                        </div>
                    </a>
                    <a class="basis-1/2">
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input @if($artwork->certificate==1) checked @endif id="bordered-radio-2" type="radio"
                                   value="1" name="certificate"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-2"
                                   class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Yes</label>
                        </div>
                    </a>
                </div>
                <label for="signature"
                       class="block text-sm font-medium text-gray-900 dark:text-white">Signature?</label>
                <div class="flex flex-row mb-5">
                    <a class="basis-1/2">
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input @if($artwork->signature==0) checked @endif id="bordered-radio-3" type="radio"
                                   value="0" name="signature"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-3"
                                   class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">No</label>
                        </div>
                    </a>
                    <a class="basis-1/2">
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input @if($artwork->signature==1) checked @endif id="bordered-radio-4" type="radio"
                                   value="1" name="signature"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-4"
                                   class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Yes</label>
                        </div>
                    </a>

                </div>
            </div>
            <button type="submit"
                    class="w-full text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Confirm changes
            </button>
        </form>
    </div>
</div>

</body>
</html>
