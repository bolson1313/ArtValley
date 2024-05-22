@include('shared.html')

@include('shared.head', ['title' => 'About'])

<body class="bg-gray-50 h-dvh flex flex-col justify-between">
<!-- navbar -->
@include('shared.navbar')

<!-- Main Content -->
<main class="flex-grow container mx-auto p-6">
    <section class="text-center mb-12">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">About us</h1>
        <p class="text-justify mb-3 text-gray-500 text-2xl dark:text-gray-400">Welcome to ArtValley, your premier destination for buying and selling a diverse range of artwork. Our platform connects artists with art enthusiasts from all over the world, fostering a vibrant community where creativity and commerce intersect.</p>
    </section>

    <section class="mb-12">
        <h2 class="text-3xl font-semibold mb-3">Our Mission</h2>
        <p class="text-justify mb-3 text-gray-500 dark:text-gray-400">At ArtValley, our mission is to democratize the art world by providing a space where artists of all backgrounds can showcase their work, and buyers can discover unique pieces that resonate with them. We believe that art should be accessible to everyone, and we strive to create a seamless and enjoyable experience for both artists and collectors.</p>
    </section>

    <section class="mb-12">
        <h2 class="mb-2 text-xl font-semibold text-gray-900 dark:text-white">What We Offer</h2>
        <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
            <li>Original Paintings</li>
            <li>Sculptures</li>
            <li>Photographs</li>
            <li>Digital Art</li>
            <li>Mixed Media</li>
        </ul>
        <br>
        <p class="text-justify mb-3 text-black dark:text-gray-400">Whether you're looking for a contemporary masterpiece or a classic piece of art, you'll find a wide range of options to suit your tastes and budget.</p>
    </section>

    <section class="mb-12">
        <h2 class="text-3xl font-semibold mb-3">Why Choose Us?</h2>
        <p class="text-lg text-gray-700">ArtValley stands out for its commitment to quality and customer satisfaction. Here are a few reasons to choose us:</p>
        <ul class="list-disc list-inside text-lg text-gray-500">
            <li><strong>Diverse Selection:</strong> A vast array of artwork from emerging and established artists.</li>
            <li><strong>Secure Transactions:</strong> Safe and secure payment options to protect both buyers and sellers.</li>
            <li><strong>Community Focused:</strong> A supportive community that values the contributions of every artist.</li>
            <li><strong>Expert Support:</strong> Dedicated customer service to assist you with any inquiries.</li>
        </ul>
    </section>
</main>



<!-- footer -->
@include('shared.footer')
</body>
</html>
