@include('shared.html')

@include('shared.head', ['title' => 'New Transaction'])

<body class="bg-gray-50 h-dvh">

@include('shared.adminpanel')

<div class="p-4 sm:ml-64 flex justify-center center">
    <div class="md:w-1/2">

        @include('shared.validation-error')

        @include('shared.session-error')

        <form class="space-y-6" action="{{ route('admin.transactionCreate') }}" method="POST">
            @csrf
            @method('POST')
            <h5 class="text-xl font-medium text-center text-gray-900 dark:text-white">Create new Transaction</h5>
            <div class="m-7 basis-1/3">
                <div class="mb-5">
                    <label for="offer_id" class="block text-sm font-medium text-gray-900 dark:text-white">Select
                        offer</label>
                    <select id="offer_id" name="offer_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose offer</option>
                        @foreach($offers as $offer)
                            @if($offer->status == 'active')
                                <option
                                    value="{{ $offer->id }}">{{'OfferID: ' .$offer->id.' - ArtworkID: '.$offer->artwork_id }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-5">
                    <label for="user_id" class="block text-sm font-medium text-gray-900 dark:text-white">Select
                        user</label>
                    <select id="user_id" name="user_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose user</option>
                        @foreach($users as $user)
                            <option
                                value="{{ $user->id }}">{{ $user->id.  ' - '.$user->name. ' ' .$user->surname }}</option>
                        @endforeach
                    </select>
                </div>
                <label for="payment_method" class="block text-sm font-medium text-gray-900 dark:text-white">Payment
                    Method</label>
                <div class="flex flex-row mb-5">
                    <a class="basis-1/3">
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input checked id="bordered-radio-1" type="radio" value="credit_card" name="payment_method"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-1"
                                   class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Card</label>
                        </div>
                    </a>
                    <a class="basis-1/3">
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bordered-radio-2" type="radio" value="bank_transfer" name="payment_method"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-2"
                                   class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bank
                                Transfer</label>
                        </div>
                    </a>
                    <a class="basis-1/3">
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bordered-radio-3" type="radio" value="cash" name="payment_method"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bordered-radio-3"
                                   class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cash</label>
                        </div>
                    </a>
                </div>
            </div>
            <button type="submit"
                    class="w-full text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Create new Transaction
            </button>
        </form>
    </div>
</div>

</body>
</html>
