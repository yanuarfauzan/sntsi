<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class District extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function villages(): HasMany
    {
        return $this->hasMany(Village::class);
    }

    public function neighborhoods(): HasManyThrough
    {
        return $this->hasManyThrough(Neighborhood::class, Village::class);
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
