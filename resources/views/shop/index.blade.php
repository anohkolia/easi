@extends('home')
@section('content')

<section>
    <!--Section des produits-->
    <div class="album py-5 bg-body-tertiary">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <!--{{dump($produits)}}-->
                @foreach($produits as $produit)
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="bd-placeholder-img card-img-top" src="{{ asset('/'.$produit->photo) }}"  alt="">
                        <div class="card-body">
                            <h4 class="card-title">
                                {{ $produit->nom }}
                            </h4>
                            <p class="card-text">
                                {{ $produit->description }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-body-secondary">{{ $produit->prix_ht }} €</small>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
