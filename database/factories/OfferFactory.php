<?php

namespace Database\Factories;

use App\Models\ArtWork;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Offer::class;
    public function definition(): array
    {
        return [
            'artwork_id' => Artwork::factory(),
            'user_id' => User::factory(),
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 100, 10000),
            'status' => $this->faker->randomElement(['active', 'inactive', 'closed']),
            'created_at' => now(),
        ];
    }
}
