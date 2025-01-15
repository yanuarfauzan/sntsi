<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funding extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'funding';

    public function houses()
    {
        return $this->belongsTo(House::class);
    }
    public function sanitations()
    {
        return $this->belongsTo(Sanitation::class);
    }

    public function achievement()
    {
        return $this->belongsTo(Achievement::class);
    }
    public function neighborhood()
    {
        return $this->belongsTo(Neighborhood::class);
    }
}
