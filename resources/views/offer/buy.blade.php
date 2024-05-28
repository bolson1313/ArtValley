@include('shared.html')

@include('shared.head', ['title'=>'Cart'])

<body class="bg-gray-50 w-full h-dvh flex flex-col justify-between">
@include('shared.navbar')

<!-- buy menu -->
<form class="m-10" method="post" action="{{ route('offer.buy', $offer) }}">
    @csrf
    @method('POST')
    <h3 class="mb-5 text-3xl font-medium text-gray-900 dark:text-white text-center">Pick payment method?</h3>
    <ul class="grid w-full gap-6 md:grid-cols-3">
        <li>
            <input type="radio" id="payment1" name="payment_method" value="cash" class="hidden peer" required />
            <label for="payment1" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="block">
                    <div class="w-full text-lg font-semibold">Cash</div>
                    <div class="w-full">Long time payment (5-7 days)</div>
                </div>
                <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </label>
        </li>
        <li>
            <input type="radio" id="payment2" name="payment_method" value="credit_card" class="hidden peer">
            <label for="payment2" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="block">
                    <div class="w-full text-lg font-semibold">Credit Card</div>
                    <div class="w-full">Short time payment (instant)</div>
                </div>
                <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </label>
        </li>
        <li>
            <input type="radio" id="payment3" name="payment_method" value="bank_transfer" class="hidden peer" required />
            <label for="payment3" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="block">
                    <div class="w-full text-lg font-semibold">Bank transfer</div>
                    <div class="w-full">Short time payment (1-2 days)</div>
                </div>
                <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </label>
        </li>
    </ul>
    <div class="flex justify-center mt-5">
        <button type="submit" class="max-w-64 text-white bg-gray-800 hover:bg-gray-700 w-1/2 focus:ring-4 focus:outline-none focus:ring-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </div>
</form>


@include('shared.footer')
</body>
</html>
