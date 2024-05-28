<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'transactions';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'offer_id',
        'payment_method',
        'type',
        'completed',
        'price'
    ];

    public function offer(): BelongsTo {
        return $this->BelongsTo(Offer::class);
    }
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
