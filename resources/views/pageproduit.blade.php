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

@yield('content')

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
