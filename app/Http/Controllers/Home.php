<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Home extends Controller
{
    public function getFiles()
    {
        // Pobierz wszystkie pliki z katalogu 'storage/app/public/img/carousel'
        $files = Storage::files('public/img/carousel');
        $offers = Offer::with(['artwork.artist'])->inRandomOrder()->take(6)->get();

        return view('home', compact('files', 'offers'));
    }
}
