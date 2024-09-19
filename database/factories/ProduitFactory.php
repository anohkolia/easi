<?php

namespace Database\Factories;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Le nom du modèle associé à cette factory.
     *
     * @var string
     */

    protected $model = Produit::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Récupère toutes les images dans le répertoire public/img/produits
        $images = glob(public_path('img/produits/*.jpg'));

        // Choisit une image aléatoire dépuis le repertoire
        $randomImage = basename($images[array_rand($images)]);

        return [
            'nom' => $this->faker->word(), // Génère un mot aléatoire
            'prix_ht' => $this->faker->randomFloat(2, 15, 60), // Génère un nombre entre 10 et 100
            'description' => $this->faker->text(), // Génère du text aléatoire
            'photo' => 'img/produits/' .$randomImage, // Utlilise une image aléatoire
        ];
    }
}
