<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Offer extends Model
{
    use HasFactory;

    protected $table = 'offers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'artwork_id',
        'user_id',
        'description',
        'price',
        'status',
        'created_at'
    ];
    public $timestamps = false;
    public function artwork(): BelongsTo {
        return $this->belongsTo(ArtWork::class);
    }

    public function transaction(): HasMany {
        return $this->HasMany(Offer::class);
    }
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
