<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Offer::insert([
            [
                'artwork_id' => 1,
                'user_id' => 2,
                'description' => 'The artwork depicts a beautiful woman drawn in black and white. The use of monochrome emphasizes the contrasts and shadows, highlighting her graceful features and elegant form. The simplicity of the colors allows the intricate details and textures to stand out, giving the piece a timeless and classic appeal.',
                'price' => 1200,
                'status' => 'active',
                'created_at' => now(),
            ],
            [
                'artwork_id' => 2,
                'user_id' => 1,
                'description' => 'The image depicts a cluster of blueberries, primarily in shades of blue and purple, characteristic of ripe berries. Interspersed among them are a few green, unripe blueberries. The mix of colors highlights the varying stages of ripeness within the cluster, creating a vibrant and natural palette. The berries are plump and glossy, with a soft, matte bloom on their surface, set against a background that emphasizes their freshness and appeal.',
                'price' => 800,
                'status' => 'active',
                'created_at' => now(),
            ],
            [
                'artwork_id' => 3,
                'user_id' => 1,
                'description' => 'The image depicts a bird perched on a branch. The bird appears to be in a natural setting, surrounded by foliage. Its feathers are intricately detailed, showcasing a range of colors that blend harmoniously with the environment. The background is softly blurred, drawing focus to the bird and the branch. The overall composition captures a serene and peaceful moment in nature, emphasizing the birds delicate presence and the tranquility of its surroundings.',
                'price' => 769,
                'status' => 'active',
                'created_at' => now(),
            ],
            [
                'artwork_id' => 4,
                'user_id' => 3,
                'description' => 'The painting features a dog as its central subject. The dog appears to be of a medium size with a well-groomed coat, displaying a friendly and alert expression. The background of the painting is softly blurred, highlighting the dog and creating a sense of depth. The use of light and shadow is masterfully done, giving the dog a lifelike appearance. The overall mood of the painting is warm and inviting, capturing the essence of the dogs loyal and gentle nature.',
                'price' => 550,
                'status' => 'active',
                'created_at' => now(),
            ],
            [
                'artwork_id' => 5,
                'user_id' => 4,
                'description' => 'The painting depicts a red-haired woman with striking blue eyes. Her vibrant hair contrasts sharply with her porcelain skin, and her deep blue eyes seem to captivate and draw in the viewer. She is portrayed with an air of mystery and elegance, her expression serene yet intense. The background is simple, ensuring all attention remains on her compelling features. The artwork beautifully captures the unique combination of her fiery hair and cool eyes, creating a mesmerizing and memorable image.',
                'price' => 5600,
                'status' => 'active',
                'created_at' => now(),
            ],
            [
                'artwork_id' => 6,
                'user_id' => 4,
                'description' => 'The painting depicts a still life scene with a bottle of wine, a glass filled with red wine, and a bunch of plump grapes on a wooden table. The composition is set against a dark, muted background, which highlights the rich colors of the wine and the grapes. The light source casts soft shadows, adding depth and realism to the objects, creating a serene and inviting atmosphere that celebrates the simplicity and beauty of everyday objects.',
                'price' => 420,
                'status' => 'active',
                'created_at' => now(),
            ],
            [
                'artwork_id' => 7,
                'user_id' => 5,
                'description' => 'The image depicts a tunnel with a lone figure standing in the middle. The tunnel, possibly part of an underground system or an old railway, stretches into the distance, with its dark and shadowy interior contrasting against the lighter entrance. The figure, silhouetted against the dim light, stands still, adding an element of mystery and contemplation to the scene. The tunnels arching walls and the presence of debris or graffiti give it a sense of abandonment and urban decay. The overall atmosphere is one of solitude, introspection, and a hint of eerie tranquility.',
                'price' => 2137,
                'status' => 'active',
                'created_at' => now(),
            ],
            [
                'artwork_id' => 8,
                'user_id' => 6,
                'description' => 'The image depicts a graffiti artwork featuring a heart with a cheerful smile. The heart is brightly colored, often in red, and includes large, expressive eyes and a wide, joyful grin. The overall mood of the graffiti is playful and uplifting, conveying positive emotions and spreading a message of happiness and love through urban street art. The heart might be surrounded by vibrant, dynamic patterns or additional elements that enhance the lively atmosphere of the piece.',
                'price' => 100,
                'status' => 'active',
                'created_at' => now(),
            ],
            [
                'artwork_id' => 9,
                'user_id' => 7,
                'description' => 'A painting featuring a goat in the image',
                'price' => 960,
                'status' => 'active',
                'created_at' => now(),
            ],
            [
                'artwork_id' => 10,
                'user_id' => 6,
                'description' => 'A picture depicting a tree against the backdrop of the moon.',
                'price' => 1011,
                'status' => 'active',
                'created_at' => now(),
            ],


        ]);
    }
}
