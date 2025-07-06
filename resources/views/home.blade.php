<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <title>exemple</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

@include('layouts.header')

<main>

    <!--DESCRIPTION DE LA PAGE DES ARTICLES-->
    <section class="py-12 text-center bg-white dark:bg-gray-900">
        <div class="max-w-2xl mx-auto py-12">
            <h1 class="text-4xl font-bold mb-4 text-gray-900 dark:text-white">Commandez votre <span class="font-semibold text-blue-600">nouveau</span> <br>T-Shirt <span class="font-semibold text-blue-600">préféré </span>!</h1>
            <p class="text-lg text-gray-600 dark:text-gray-300 mb-6">Dénichez le T-Shirt de votre série, films préféré(e).</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#" class="px-6 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700 transition">Main call to action</a>
                <a href="#" class="px-6 py-2 bg-gray-200 text-gray-800 rounded shadow hover:bg-gray-300 transition">Secondary action</a>
            </div>
        </div>
    </section>

    @yield('content')

</main>

<!--PIED DE PAGE-->
<footer class="text-gray-400 py-8 bg-gray-900 mt-10">
    <div class="max-w-4xl mx-auto px-4">
        <div class="flex justify-end mb-2">
            <a href="#" class="text-blue-400 hover:underline">Back to top</a>
        </div>
        <p class="mb-2">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Tailwind? <a href="/" class="text-blue-400 hover:underline">Visit the homepage</a> or read the <a href="https://tailwindcss.com/docs/installation" class="text-blue-400 hover:underline">getting started guide</a>.</p>
    </div>
</footer>

</body>

</html>
