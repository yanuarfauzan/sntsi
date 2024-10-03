<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Neighborhood extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function negative_list(): HasOne
    {
        return $this->hasOne(NegativeList::class);
    }

    public function house(): HasOne
    {
        return $this->hasOne(House::class);
    }

    public function water(): HasOne
    {
        return $this->hasOne(Water::class);
    }

    public function sanitation(): HasOne
    {
        return $this->hasOne(Sanitation::class);
    }

    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function images() : HasMany
    {
        return $this->hasMany(NeighborhoodImage::class);
    }
}
