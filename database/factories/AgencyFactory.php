<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agency>
 */
class AgencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'best tour',
            'description' => "Best Tours votre Agence de Voyage en Tunisie vous propose des Promotions sur vos Voyages et Séjours en Tunisie et dans le Monde avec les Meilleurs Prix et Services.",
            'networks' => json_encode([
                'facebook' => "https://fr-fr.facebook.com/AgenceBestTours",
                'instagram' => "https://www.instagram.com/best_tours_tunisia",
                'whatapp' => "https://wa.me/99748029/44848350"
            ])
        ];
    }
}
