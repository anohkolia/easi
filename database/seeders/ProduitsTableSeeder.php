<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $produit = new \App\Models\Produit();
        $produit->nom = "Chemise Hawai";
        $produit->prix_ht = 20;
        $produit->description = "Bonjour je suis une belle Chemise Hawai de taille XL";
        $produit->photo = "f1.jpg";
        $produit->save();

        $produit = new \App\Models\Produit();
        $produit->nom = "Chemise Fleurie Vert";
        $produit->prix_ht = 22;
        $produit->description = "Bonjour je suis une belle Chemise Fleurie Vert de taille XL";
        $produit->photo = "f2.jpg";
        $produit->save();

        $produit = new \App\Models\Produit();
        $produit->nom = "Chemise Fleurie Rouge";
        $produit->prix_ht = 24;
        $produit->description = "Bonjour je suis une belle Chemise Fleurie Rouge de taille XL";
        $produit->photo = "f3.jpg";
        $produit->save();

        $produit = new \App\Models\Produit();
        $produit->nom = "Chemise Fleurie Blanc";
        $produit->prix_ht = 19;
        $produit->description = "Bonjour je suis une belle Chemise Fleurie Blanc de taille XL";
        $produit->photo = "f4.jpg";
        $produit->save();

        $produit = new \App\Models\Produit();
        $produit->nom = "Chemise Bleue Fleurie";
        $produit->prix_ht = 25;
        $produit->description = "Bonjour je suis une belle Chemise Bleue Fleurie de taille XL";
        $produit->photo = "f5.jpg";
        $produit->save();

        $produit = new \App\Models\Produit();
        $produit->nom = "Chemise Orange & bleue";
        $produit->prix_ht = 18;
        $produit->description = "Bonjour je suis une belle Chemise Orange & bleue de taille XL";
        $produit->photo = "f6.jpg";
        $produit->save();

        $produit = new \App\Models\Produit();
        $produit->nom = "Pantalon Femme";
        $produit->prix_ht = 30;
        $produit->description = "Bonjour je suis un beau Pantalon Femme de taille XL";
        $produit->photo = "f7.jpg";
        $produit->save();

        $produit = new \App\Models\Produit();
        $produit->nom = "Chemise";
        $produit->prix_ht = 21;
        $produit->description = "Bonjour je suis unee belle Chemise Hawai de taille XL";
        $produit->photo = "f8.jpg";
        $produit->save();
    }
}
