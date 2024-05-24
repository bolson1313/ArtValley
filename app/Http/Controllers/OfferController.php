<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\ArtWork;
use App\Models\Offer;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $form = $request->input('form');

        if ($form) {
            $offers = Offer::where('status', '!=', 'closed')
                ->whereHas('artwork', function ($query) use ($form) {
                    $query->where('form', $form);
                })->get();
        } else {
            $offers = Offer::where('status', '!=', 'closed')->get();
        }

        return view('offer.index', compact('offers', 'form'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('offer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOfferRequest $request)
    {
        //dd($request->all());
        $artist = Artist::firstOrNew(
            ['name' => $request->input('name')],
            ['surname' => $request->input('surname')]
        );
        if($artist->id == null) {
            $nextArtistID = $this->getNextArtistID();
            $artist->id = $nextArtistID;
        }

        $imageName =$request->input('name'). '-' .time() . '-' . $request->input('title'). '.' .$request-> file_input -> extension();
        $request-> file_input -> move(public_path('storage/img/artworks/'), $imageName);

        $artwork = Artwork::firstOrNew(
            [
                'title' => $request->input('title'),
                'image' => 'img/artworks/'.$imageName,
                'form' => $request->input('form'),
                'medium' => $request->input('medium'),
                'size' => $request->input('size'),
                'certificate' => $request->input('certificate'),
                'signature' => $request->input('signature')
            ]
        );
        $artwork->artist_id = $artist->id;

        if($artwork->id == null) {
            $nextArtworkId = $this->getNextArtworkId();
            $artwork->id = $nextArtworkId;
        }


        $offer = Offer::firstOrNew(
            [
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'status' => $request->input('status'),
            ]
        );

        $offer->user_id = Auth::id();
        $offer->artwork_id = $artwork->id;
        $offer->created_at =now()->toDateTimeString();

        //dd($artist, $artwork, $offer);

        $artist->save();
        $artwork->save();
        $offer->save();

        return redirect()->route('offer.user', Auth::id());
    }

    public function getNextArtworkId()
    {
        // Pobierz ostatni rekord
        $latestArtWork = ArtWork::orderBy('id', 'desc')->first();

        // Pobierz id i zwiększ o 1
        $nextId = $latestArtWork ? $latestArtWork->id + 1 : 1;

        return $nextId;
    }
    public function getNextArtistID()
    {
        // Pobierz ostatni rekord
        $latestArtist = Artist::orderBy('id', 'desc')->first();

        // Pobierz id i zwiększ o 1
        $nextId = $latestArtist ? $latestArtist->id + 1 : 1;

        return $nextId;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('offer.show', [
            'offer' => Offer::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $offer = Offer::findOrFail($id);
        $artwork = $offer->artwork;
        $artist = $offer->artwork->artist;
        return view('offer.edit', [
            'offer' => $offer,
            'artwork' => $artwork,
            'artist' => $artist
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOfferRequest $request, $id)
    {
        $offer = Offer::findOrFail($id);
        $input = $request->all();
        $offer->update($input);
        return redirect()->route('offer.user', Auth::id());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->route('offer.user', Auth::id());
    }
    public function show_form(){
        return view('offer.create');
    }

    public function user_offers($user_id) {
        // Pobierz oferty użytkownika na podstawie user_id
        $offers = Offer::with(['artwork.artist'])->where('user_id', $user_id)->get();
        // Przekaż oferty do widoku
        return view('offer.user', compact('offers'));
    }
}
