@extends('home')
@section('content')

<section>
    <!--Section des produits-->
    <div class="py-10 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!--{{dump($produits)}}-->
                @foreach($produits as $produit)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition overflow-hidden flex flex-col">
                    <img class="w-full h-48 object-cover" src="{{ asset('/'.$produit->photo) }}" alt="">
                    <div class="p-4 flex-1 flex flex-col">
                        <h4 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white">{{ $produit->nom }}</h4>
                        <p class="text-gray-600 dark:text-gray-300 flex-1">{{ $produit->description }}</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-sm text-gray-500 dark:text-gray-400 font-bold">{{ $produit->prix_ht }} €</span>
                            <div class="flex gap-2">
                                <button type="button" class="px-3 py-1 text-xs font-medium text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white transition">View</button>
                                <button type="button" class="px-3 py-1 text-xs font-medium text-gray-700 border border-gray-400 rounded hover:bg-gray-200 transition">Edit</button>
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
