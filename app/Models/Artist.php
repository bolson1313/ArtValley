<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artist extends Model
{
    use HasFactory;

    protected $table = 'artists';
    protected $primaryKey = 'id';


    protected $fillable = ['name', 'surname'];

    public function artworks(): HasMany {
        return $this->hasMany(ArtWork::class);
    }
}
