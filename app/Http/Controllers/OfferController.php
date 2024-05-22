<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
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


    public function show($id)
    {
        return view('offer.show', [
            'offer' => Offer::findOrFail($id)
        ]);
    }

}
