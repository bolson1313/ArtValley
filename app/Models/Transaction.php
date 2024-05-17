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

    public function offer(): HasOne {
        return $this->hasOne(Offer::class);
    }
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
