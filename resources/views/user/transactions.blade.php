@include('shared.html')

@include('shared.head', ['title' => 'Your Transactions'])

<body class="bg-gray-50 h-dvh flex flex-col justify-start ">
<!-- navbar -->
@include('shared.navbar')

<!-- User offers -->
<div class="relative overflow-x-auto shadow-md sm:rounded-lg m-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-800 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                User ID
            </th>
            <th scope="col" class="px-6 py-3">
                Offer ID
            </th>
            <th scope="col" class="px-6 py-3">
                PaymentMethod
            </th>
            <th scope="col" class="px-6 py-3">
                Sell/Buy
            </th>
            <th scope="col" class="px-6 py-3">
                Price
            </th>
            <th scope="col" class="px-6 py-3">
                Completed
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($transactions as $transaction)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $transaction->user_id }}
                </th>
                <td class="px-6 py-4">
                    {{ $transaction->offer_id }}
                </td>
                <td class="px-6 py-4">
                    {{ $transaction->payment_method }}
                </td>
                <td class="px-6 py-4">
                    {{ $transaction->type }}
                </td>
                <td class="px-6 py-4">
                    {{ $transaction->price }}
                </td>
                <td class="px-6 py-4">
                    {{ $transaction->completed }}
                </td>
            </tr>
        @empty
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th colspan="5" class="px-6 py-4 font-bold text-xl text-center text-gray-900 whitespace-nowrap dark:text-white">
                    You have no finished transactions!
                </th>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
