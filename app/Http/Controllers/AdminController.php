<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArtistRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateArtistRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Artist;
use App\Models\ArtWork;
use App\Models\Offer;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function showAdmin() {
        Gate::authorize('is-admin');
        return view('admin.panel');
    }


    //Users CRUD
    public function users() {
        Gate::authorize('is-admin');
        $users = User::all();
        //dd($users[0]->attributesToArray());
        return view('admin.users', compact('users'));
    }

    public function user_add() {
        Gate::authorize('is-admin');

        return view('admin.userNew');
    }

    public function user_store(StoreUserRequest $request) {
        Gate::authorize('is-admin');

        if ($request->hasFile('file_input')) {
            $file = $request->file('file_input');
            $imageName = $request->input('name') . '-' . $request->input('nickname') . '-' . time() . '.' . $file->extension();
            $file->move(public_path('storage/img/avatars/'), $imageName);
        } else {
            $imageName = $request->input('name') . '-' . $request->input('nickname') . '-' . time() . '.png';
            Storage::copy('public/blank-profile.png', 'public/img/avatars/' . $imageName);
        }

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'nickname' => $request->nickname,
            'avatar' => $imageName,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users');
    }

    public function user_edit(User $user) {
        Gate::authorize('is-admin');

        return view('admin.userEdit', compact('user'));
    }

    public function user_update(Request $request) {
        Gate::authorize('is-admin');
        $user = User::find($request->query('user_input'));
        //dd($request);

        $request->validate([
            'name' => 'required|string|max:50|min:3',
            'surname' => 'required|string|max:50|min:3',
            'nickname' => 'required|string|max:50|min:3|unique:users,nickname,'.$user->id.',id',
            'file_input' => 'mimes:jpeg,png,jpg|max:5048',
            'email' => 'required|string|email|max:70|unique:users,email,'.$user->id.',id',
            'password' => 'required|string|min:8',
        ]);

        if ($request->hasFile('file_input')) {
            Storage::delete('public/img/avatars/'.$user->avatar);
            $file = $request->file('file_input');
            $imageName = $request->input('name') . '-' . $request->input('nickname') . '-' . time() . '.' . $file->extension();
            $file->move(public_path('storage/img/avatars/'), $imageName);
            $user->avatar = $imageName;
        }
//        else {
//            $imageName = $request->input('name') . '-' . $request->input('nickname') . '-' . time() . '.png';
//            Storage::copy('public/blank-profile.png', 'public/img/avatars/' . $imageName);
//        }



        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->nickname = $request->nickname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->updated_at = now();


        $user->save();

        return redirect()->route('admin.users');
    }

    public function user_destroy(User $user)
    {
        Gate::authorize('is-admin');
        //dd($user);
        $user->delete();

        return redirect()->route('admin.users');
    }


    //Artists CRUD
    public function artists() {
        Gate::authorize('is-admin');
        $artists = Artist::all();
        //dd($artists);
        return view('admin.artists', compact('artists'));
    }
    public function artist_add() {
        Gate::authorize('is-admin');

        return view('admin.artistNew');
    }

    public function artist_store(StoreArtistRequest $request) {
        Gate::authorize('is-admin');
        //dd($request->all());
        Artist::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
        ]);

        return redirect()->route('admin.artists');
    }

    public function artist_edit(Artist $artist) {
        Gate::authorize('is-admin');

        return view('admin.artistEdit', compact('artist'));
    }

    public function artist_update(UpdateArtistRequest $request) {
        Gate::authorize('is-admin');
        //dd($request);
        $artist = Artist::find($request->input('id'));
        //dd($request);



        $artist->name = $request->input('name');
        $artist->surname = $request->input('surname');


        $artist->save();

        return redirect()->route('admin.artists');
    }

    public function artist_destroy(Artist $artist)
    {
        Gate::authorize('is-admin');
        //dd($artist);
        $artist->delete();

        return redirect()->route('admin.artists');
    }


    // Artworks CRUD
    public function artworks() {
        Gate::authorize('is-admin');
        $artworks = ArtWork::all();
        return view('admin.artworks', compact('artworks'));
    }

    public function artwork_add() {
        Gate::authorize('is-admin');
        $artists = Artist::all();
        return view('admin.artworkNew', compact('artists'));
    }

    public function artwork_store(Request $request) {
        Gate::authorize('is-admin');
        //dd($request);
        $request->validate([
            'artist_id' => 'required',
            'title' => 'required|string',
            'file_input' => 'required|mimes:jpeg,png,jpg|max:5048',
            'form' => 'string|in:painting,sculpture,drawing,photography',
            'medium' => 'string|in:pencil,ink,chalk,oil,tempera,watercolor,acrylic,bronze,marble,wood,metal,digital,film,mixed,temporary',
            'size' => 'required|string|max:50',
        ]);

        $imageName =time() . '-' . $request->input('title'). '.' .$request-> file_input -> extension();
        $request-> file_input -> move(public_path('storage/img/artworks/'), $imageName);

        ArtWork::create([
            'artist_id' => $request->input('artist_id'),
            'title' => $request->input('title'),
            'image' => 'img/artworks/'.$imageName,
            'form' => $request->input('form'),
            'medium' => $request->input('medium'),
            'size' => $request->input('size'),
            'certificate' => $request->certificate,
            'signature' => $request->signature
        ]);

        //dd($request->all());
        //ArtWork::create($request->all());
        return redirect()->route('admin.artworks');
    }

    public function artwork_edit(ArtWork $artwork) {
        Gate::authorize('is-admin');
        $artists = Artist::all();
        return view('admin.artworkEdit', compact(['artwork', 'artists']));
    }

    public function artwork_update(Request $request) {
        Gate::authorize('is-admin');
        //dd($request);

        $request-> validate([
            'artist_id' => 'required',
            'title' => 'required|string',
            'file_input' => 'mimes:jpeg,png,jpg|max:5048',
            'form' => 'string|in:painting,sculpture,drawing,photography',
            'medium' => 'string|in:pencil,ink,chalk,oil,tempera,watercolor,acrylic,bronze,marble,wood,metal,digital,film,mixed,temporary',
            'size' => 'required|string|max:50',
            'certificate' => 'required',
            'signature' => 'required',
        ]);

        $artwork = ArtWork::find($request->input('id'));

        if ($request->hasFile('file_input')) {
            $old_artwork = ArtWork::find($request->input('id'));
            Storage::delete('public/'.$old_artwork->image);

            $imageName =$request->input('title') . '-' . time() . '.' .$request-> file_input -> extension();
            $request-> file_input -> move(public_path('storage/img/artworks/'), $imageName);
            $artwork->image = 'img/artworks/'.$imageName;
        }
        //dd($old_artwork);

        $artwork->artist_id = $request->input('artist_id');
        $artwork->title = $request->input('title');
        $artwork->form = $request->input('form');
        $artwork->medium = $request->input('medium');
        $artwork->size = $request->input('size');
        $artwork->certificate = $request->input('certificate');
        $artwork->signature = $request->input('signature');

        $artwork->update();
        return redirect()->route('admin.artworks');
    }

    public function artwork_destroy(ArtWork $artwork) {
        Gate::authorize('is-admin');
        $artwork->delete();
        return redirect()->route('admin.artworks');
    }

    // Offers CRUD
    public function offers() {
        Gate::authorize('is-admin');
        $offers = Offer::all();
        return view('admin.offers', compact('offers'));
    }

    public function offer_add() {
        Gate::authorize('is-admin');
        $artworks = ArtWork::all();
        $users = User::all();
        return view('admin.offerNew', compact(['artworks', 'users']));
    }

    public function offer_store(Request $request) {
        Gate::authorize('is-admin');

        $request->validate([
            'user_id' => 'required',
            'artwork_id' => 'required',
            'description' => 'required|string|max:200',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'created_at' => 'date',
        ]);

        //dd($request->all());

        Offer::create($request->all());
        return redirect()->route('admin.offers');
    }

    public function offer_edit(Offer $offer) {
        Gate::authorize('is-admin');
        $artworks = ArtWork::all();
        $users = User::all();
        return view('admin.offerEdit', compact(['offer', 'artworks', 'users']));
    }

    public function offer_update(Request $request) {
        Gate::authorize('is-admin');
        //dd($request->all());
        $offer = Offer::find($request->input('id'));
        $offer->update($request->all());
        return redirect()->route('admin.offers');
    }

    public function offer_destroy(Offer $offer) {
        Gate::authorize('is-admin');
        $offer->delete();
        return redirect()->route('admin.offers');
    }

    // Transactions CRUD
    public function transactions() {
        Gate::authorize('is-admin');
        $transactions = Transaction::all();
        return view('admin.transactions', compact('transactions'));
    }

    public function transaction_add() {
        Gate::authorize('is-admin');
        $users = User::all();
        $offers = Offer::all();
        return view('admin.transactionNew', compact(['offers', 'users']));
    }

    public function transaction_store(Request $request) {
        Gate::authorize('is-admin');

        $request ->validate([
            'user_id' => 'required',
            'offer_id' => 'required',
            'payment_method' => 'required',
        ]);
        $offer = Offer::find($request->input('offer_id'));
        //dd($offer);
        $offer->update([
           'status' => 'closed'
        ]);
        //buying person
        Transaction::create([
            'user_id' => $request->input('user_id'),
            'offer_id' => $request->input('offer_id'),
            'payment_method' => $request->input('payment_method'),
            'price' => $offer->price,
            'type' => 'buy',
        ]);


        $selling_person = User::find($offer->user_id);
        //selling person
        Transaction::create([
            'user_id' => $selling_person->id,
            'offer_id' => $request->input('offer_id'),
            'payment_method' => $request->input('payment_method'),
            'price' => $offer->price,
            'type' => 'sell',
        ]);
        return redirect()->route('admin.transactions');
    }

    public function transaction_destroy(Transaction $transaction) {
        Gate::authorize('is-admin');
        $transaction->delete();
        return redirect()->route('admin.transactions');
    }

    public function offerStats() {
        $offers= Offer::all()->groupBy('status')->map(function ($offers) {
            return $offers->count();
        });
        //dd($offers);
        return view('admin.stats', compact('offers'));
    }
}
