@extends('pageproduit')
@section('content')
<!--FILE ARIANE-->
<nav class="text-sm mb-4" aria-label="breadcrumb">
    <ol class="flex space-x-2 text-gray-500">
        <li><a href="#" class="hover:underline text-blue-600">Accueil</a></li>
        <li>/</li>
        <li><a href="#" class="hover:underline text-blue-600">Films</a></li>
        <li>/</li>
        <li class="text-gray-700">Les goonies</li>
    </ol>
</nav>

<!--DETAIL DU PRODUIT-->
<main role="main">

    <div class="max-w-5xl mx-auto">
        <div class="flex flex-col md:flex-row md:justify-between gap-8">
            <div class="md:w-1/2">
                <div class="bg-white rounded-lg shadow mb-4 overflow-hidden">
                    <img class="w-full h-80 object-cover" src="produits/goonies.jpg" alt="Card image cap">
                </div>
            </div>
            <div class="md:w-1/2 flex flex-col">
                <h1 class="text-3xl font-bold mb-2">T-Shirt Goonies</h1>
                <h5 class="text-xl text-red-600 font-semibold mb-2">29.00 €</h5>
                <p class="text-gray-600 mb-4">Cinoque aime choco! consectetur adipisicing elit. Dignissimos dolore eaque earum eos ex, exercitationem facilis magni maiores maxime natus neque odit quo quod recusandae tempora unde ut veritatis vero!</p>
                <hr class="my-2">
                <label for="size" class="block mb-1 font-medium">Choisissez votre taille</label>
                <select name="size" id="size" class="block w-full border-gray-300 rounded p-2 mb-4">
                    <option value="xs">XS</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                    <option value="xxl">XXL</option>
                </select>
                <p>
                    <a href="#" class="btn btn-cart my-2 btn-block"><i class="fas fa-shopping-cart"></i> Ajouter au
                        Panier</a>
                </p>

            </div>
        </div>
    </div>


    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <h3>Vous aimerez aussi :</h3>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img src="produits/hulk.jpg" class="card-img-top img-fluid" alt="Responsive image">

                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img src="produits/krusty_simpsons.jpg" class="card-img-top img-fluid" alt="Responsive image">

                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img src="produits/star_trek_kirk.jpg" class="card-img-top img-fluid" alt="Responsive image">

                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@extends('home')
@section('content')

<section class="py-12 bg-white dark:bg-gray-800">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4">
                    <img class="w-full h-full object-cover" src="{{ asset('/f1.jpg') }}" alt="Produit">
                </div>
                <div class="flex -mx-2 mb-4">
                    <div class="w-1/2 px-2">
                        <button class="w-full bg-gray-900 dark:bg-gray-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 dark:hover:bg-gray-700">Ajouter au panier</button>
                    </div>
                    <div class="w-1/2 px-2">
                        <button class="w-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-gray-300 dark:hover:bg-gray-600">Acheter maintenant</button>
                    </div>
                </div>
            </div>
            <div class="md:flex-1 px-4">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Chemise Hawai</h2>
                <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed ante justo. Integer euismod libero id neque auctor, quis aliquam mauris consectetur.
                </p>
                <div class="flex mb-4">
                    <div class="mr-4">
                        <span class="font-bold text-gray-700 dark:text-gray-300">Prix:</span>
                        <span class="text-gray-600 dark:text-gray-300">20.00 €</span>
                    </div>
                    <div>
                        <span class="font-bold text-gray-700 dark:text-gray-300">Disponibilité:</span>
                        <span class="text-gray-600 dark:text-gray-300">En stock</span>
                    </div>
                </div>
                <div class="mb-4">
                    <span class="font-bold text-gray-700 dark:text-gray-300">Taille disponible:</span>
                    <div class="flex items-center mt-2">
                        <button class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">S</button>
                        <button class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">M</button>
                        <button class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">L</button>
                        <button class="bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-white py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400 dark:hover:bg-gray-600">XL</button>
                    </div>
                </div>
                <div>
                    <span class="font-bold text-gray-700 dark:text-gray-300">Description du produit:</span>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">
                        Bonjour je suis une belle Chemise Hawai de taille XL. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed ante justo. Integer euismod libero id neque auctor, quis aliquam mauris consectetur. Proin egestas, risus a condimentum interdum, nisi felis eleifend risus, a condimentum interdum felis risus a sapien.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
</main>
@endsection
