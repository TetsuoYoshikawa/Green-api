<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Green extends Model
{
    use HasFactory;
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
