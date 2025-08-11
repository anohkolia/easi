<?php
<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Seeder;

class ProduitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produit = new Produit();
        $produit->nom = "Chemise Hawai";
        $produit->prix_ht = 20;
        $produit->description = "Bonjour je suis une belle Chemise Hawai de taille XL";
        $produit->photo = "img/produits/f1.jpg";
        $produit->save();

        $produit = new Produit();
        $produit->nom = "Chemise Fleurie Vert";
        $produit->prix_ht = 22;
        $produit->description = "Bonjour je suis une belle Chemise Fleurie Vert de taille XL";
        $produit->photo = "img/produits/f2.jpg";
        $produit->save();

        $produit = new Produit();
        $produit->nom = "Chemise Fleurie Rouge";
        $produit->prix_ht = 24;
        $produit->description = "Bonjour je suis une belle Chemise Fleurie Rouge de taille XL";
        $produit->photo = "img/produits/f3.jpg";
        $produit->save();

        $produit = new Produit();
        $produit->nom = "Chemise Fleurie Blanc";
        $produit->prix_ht = 19;
        $produit->description = "Bonjour je suis une belle Chemise Fleurie Blanc de taille XL";
        $produit->photo = "img/produits/f4.jpg";
        $produit->save();

        $produit = new Produit();
        $produit->nom = "Chemise Bleue Fleurie";
        $produit->prix_ht = 25;
        $produit->description = "Bonjour je suis une belle Chemise Bleue Fleurie de taille XL";
        $produit->photo = "img/produits/f5.jpg";
        $produit->save();

        $produit = new Produit();
        $produit->nom = "Chemise Orange & bleue";
        $produit->prix_ht = 18;
        $produit->description = "Bonjour je suis une belle Chemise Orange & bleue de taille XL";
        $produit->photo = "img/produits/f6.jpg";
        $produit->save();

        $produit = new Produit();
        $produit->nom = "Pantalon Femme";
        $produit->prix_ht = 30;
        $produit->description = "Bonjour je suis un beau Pantalon Femme de taille XL";
        $produit->photo = "img/produits/f7.jpg";
        $produit->save();

        $produit = new Produit();
        $produit->nom = "Chemise";
        $produit->prix_ht = 21;
        $produit->description = "Bonjour je suis une belle Chemise Hawai de taille XL";
        $produit->photo = "img/produits/f8.jpg";
        $produit->save();
    }
}
namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // Créer 8 produits fictifs avec la factory
            Produit::factory(9)->create();
    }
}
