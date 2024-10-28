<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\View\view;

class MainController extends Controller
{
    public function index(): view {

        // SELECT * FROM produits;
        $produits = Produit::all();
        //dd($produits);

        return view("Shop.index", ['produits' => $produits]);
    }

    public function detailproduit(): view {
        //echo  "page détaille produit";
        return view("shop.detailproduit");
    }
}
