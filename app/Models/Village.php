<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Village extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function neighborhoods(): HasMany
    {
        return $this->hasMany(Neighborhood::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function houses(): HasManyThrough
    {
        return $this->hasManyThrough(House::class, Neighborhood::class);
    }

    public function waters(): HasManyThrough
    {
        return $this->hasManyThrough(Water::class, Neighborhood::class);
    }

    public function sanitations(): HasManyThrough
    {
        return $this->hasManyThrough(Sanitation::class, Neighborhood::class);
    }
}
