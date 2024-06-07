<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Models\Artist;
use App\Models\ArtWork;
use App\Models\Offer;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use function PHPUnit\Framework\isEmpty;

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
        $offer = Offer::find($id);
        if(!$offer){
            return response()->view('errors.404', [], 404);
        }
        return view('offer.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        Gate::authorize('view', $offer);

        $offer_find = Offer::find($offer->id);
        $artwork = $offer_find->artwork;
        $artist = $offer_find->artwork->artist;
        return view('offer.edit', [
            'offer' => $offer_find,
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
        Gate::authorize('delete', $offer);
        $offer->delete();
        return redirect()->route('offer.user', Auth::id());
    }
    public function show_form(){
        return view('offer.create');
    }

    public function user_offers(User $user) {
        Gate::authorize('view', [$user, Offer::class]);

        // Pobierz oferty użytkownika na podstawie user_id
        $offers = Offer::with(['artwork.artist'])->where('user_id', $user->id)->get();

        foreach ($offers as $offer) {
            Gate::authorize('view', [$user, $offer]);
        }

        // Przekaż oferty do widoku
        return view('offer.user', compact('offers'));
    }

    public function buy_menu(Offer $offer) {
        if(!Auth::check() || Auth::id() == $offer->user_id || $offer->status != ('inactive' || 'closed')){

            abort(401);
        }
        return view('offer.buy', compact('offer'));
    }

    public function buy_offer(Request $request, Offer $offer) {
        if(!Auth::check() || Auth::id() == $offer->user_id || $offer->status != ('inactive' || 'closed')){
            abort(403);
        }
        Transaction::create(
            [
                'user_id' => Auth::id(),
                'offer_id' => $offer->id,
                'payment_method' => $request->input('payment_method'),
                'price' => $offer->price,
                'type' => 'buy',
                'completed' => now()->toDateTimeString(),
            ]
        );

        Transaction::create(
            [
                'user_id' => $offer->user_id,
                'offer_id' => $offer->id,
                'payment_method' => $request->input('payment_method'),
                'price' => $offer->price,
                'type' => 'sell',
                'completed' => now()->toDateTimeString(),
            ]
        );

        $offer -> status = 'closed';

        $offer -> save();
        // Przekaż oferty do widoku
       return redirect()->route('user.transactions', Auth::user());
    }
}
