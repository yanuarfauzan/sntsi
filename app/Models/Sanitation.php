<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanitation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function funding()
    {
        return $this->hasMany(Funding::class);
    }
    public function neighborhood()
    {
        return $this->belongsTo(Neighborhood::class);
    }
}
