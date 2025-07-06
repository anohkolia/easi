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

</main>
@endsection
