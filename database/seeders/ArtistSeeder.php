<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\ArtWork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artist::factory()->count(8)->create();
    }
}
