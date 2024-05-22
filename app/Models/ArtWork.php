<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ArtWork extends Model
{
    use HasFactory;

    protected $table = 'art_works';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function artist(): BelongsTo{
        return $this->belongsTo(Artist::class);
    }
    public function offer(): HasOne {
        return $this->hasOne(Offer::class);
    }
}
