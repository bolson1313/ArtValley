<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\ArtWork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artwork::insert([
            [
                'artist_id' => 1,
                'title' => 'Woman In Gray',
                'image' => 'img/artworks/exampleartwork1.jpg',
                'form' => 'painting',
                'medium' => 'pencil',
                'size' => 'big painting 21cm x 40xm',
                'certificate' => 1,
                'signature' => 1
            ],
            [
                'artist_id' => 2,
                'title' => 'Blue Mind',
                'image' => 'img/artworks/exampleartwork2.jpg',
                'form' => 'painting',
                'medium' => 'oil',
                'size' => 'small square painting 20cm x 20cm',
                'certificate' => 0,
                'signature' => 1
            ],
            [
                'artist_id' => 3,
                'title' => 'Morning',
                'image' => 'img/artworks/exampleartwork3.jpg',
                'form' => 'painting',
                'medium' => 'watercolor',
                'size' => 'medium painting',
                'certificate' => 1,
                'signature' => 1
            ],
            [
                'artist_id' => 4,
                'title' => 'Best Friend',
                'image' => 'img/artworks/exampleartwork4.jpg',
                'form' => 'drawing',
                'medium' => 'pencil',
                'size' => 'medium square format',
                'certificate' => 1,
                'signature' => 0
            ],
            [
                'artist_id' => 5,
                'title' => 'Blue lagoon',
                'image' => 'img/artworks/exampleartwork5.png',
                'form' => 'photography',
                'medium' => 'digital',
                'size' => 'small photo',
                'certificate' => 0,
                'signature' => 1
            ],
            [
                'artist_id' => 6,
                'title' => 'Spanish dinner',
                'image' => 'img/artworks/exampleartwork6.jpg',
                'form' => 'painting',
                'medium' => 'acrylic',
                'size' => 'medium painting',
                'certificate' => 1,
                'signature' => 0
            ],
            [
                'artist_id' => 7,
                'title' => 'Nowhere',
                'image' => 'img/artworks/exampleartwork7.jpg',
                'form' => 'photography',
                'medium' => 'digital',
                'size' => 'big size photo',
                'certificate' => 1,
                'signature' => 1
            ],
            [
                'artist_id' => 8,
                'title' => 'Happy Day',
                'image' => 'img/artworks/exampleartwork8.jpg',
                'form' => 'drawing',
                'medium' => 'temporary',
                'size' => 'huge drawing on wall',
                'certificate' => 0,
                'signature' => 0
            ],
            [
                'artist_id' => 4,
                'title' => 'Farm',
                'image' => 'img/artworks/exampleartwork9.jpg',
                'form' => 'photography',
                'medium' => 'digital',
                'size' => 'small size photo',
                'certificate' => 0,
                'signature' => 0
            ],
            [
                'artist_id' => 2,
                'title' => 'Void',
                'image' => 'img/artworks/exampleartwork10.jpg',
                'form' => 'drawing',
                'medium' => 'chalk',
                'size' => 'huge size drawing',
                'certificate' => 1,
                'signature' => 1
            ],
        ]);
    }
}
