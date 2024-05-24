<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function getTransactions(User $user) {
        $transactions = Transaction::where('user_id', $user->id)
            ->get();
        //dd($transactions);
        return view('user.transactions', compact('transactions'));
    }
}
