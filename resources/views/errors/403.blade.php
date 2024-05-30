@include('shared.html')

@include('shared.head', ['title' => 'Error 403'])

<body class="bg-gray-50 h-dvh flex flex-col justify-between">
<!-- navbar -->
@include('shared.navbar')

@include('shared.session-error')

<div class="flex items-center justify-center min-h-96">
    <div class="text-center">
        <h1 class="text-6xl font-bold text-lime-700 mb-4">Oops, you are not authorized to do this action!</h1>
        <a href="{{ route('offer.index') }}" class="text-lime-700 text-2xl underline">Return to home page</a>
    </div>
</div>

<!-- footer -->
@include('shared.footer')
</body>
</html>
