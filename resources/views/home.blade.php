<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <title>exemple</title>

    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

@include('layouts.header')

<main>

    <!--DESCRIPTION DE LA PAGE DES ARTICLES-->
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="jumbotron-heading">Commandez votre <span class="fw-semibold">nouveau</span> <br>T-Shirt <span class="fw-semibold">préféré </span>!</h1>

                <p class="lead text-muted">Dénichez le T-Shirt de votre série, films préféré(e).</p>

                <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p>
            </div>
        </div>
    </section>

    @yield('content')

</main>

<!--PIED DE PAGE-->
<footer class="text-body-secondary py-5">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#">Back to top</a>
        </p>
        <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a
                href="/docs/5.3/getting-started/introduction/">getting started guide</a>.
        </p>
    </div>
</footer>

</body>

</html>
