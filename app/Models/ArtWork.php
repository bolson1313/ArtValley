<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArtWork extends Model
{
    use HasFactory;

    protected $table = 'art_works';
    protected $primaryKey = 'id';

    public function artist(): BelongsTo{
        return $this->belongsTo(Artist::class);
    }
    public function offer(): BelongsTo {
        return $this->belongsTo(Offer::class);
    }
}
