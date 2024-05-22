<?php

namespace Database\Factories;

use App\Models\Artist;
use App\Models\ArtWork;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use function Webmozart\Assert\Tests\StaticAnalysis\boolean;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArtWork>
 */
class ArtWorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Artwork::class;
    public function definition(): array
    {
        // Ensure the directory exists
        // Ensure the directory exists
        if (!Storage::exists('public/img/artworks')) {
            Storage::makeDirectory('public/img/artworks');
        }

        // Generate a local image file
        $file = $this->faker->image(storage_path('app/public/img/artworks'), 640, 480, 'black', false, true, 'art', true);
        $filePath = 'img/artworks/' . basename($file);

        return [
            'artist_id' => Artist::factory(),
            'title' => $this->faker->word(),
            'image-path' => $filePath,
            'form' => $this->faker->randomElement(['painting', 'sculpture', 'drawing', 'photography']),
            'medium' => $this->faker->randomElement(['pencil', 'ink', 'chalk', 'oil', 'tempera', 'watercolor', 'acrylic', 'bronze', 'marble', 'wood', 'metal', 'digital', 'film', 'mixed', 'temporary']),
            'size' => $this->faker->randomElement(['small', 'medium', 'large']),
            'certificate' => $this->faker->boolean,
            'signature' => $this->faker->boolean,
        ];
    }
}
