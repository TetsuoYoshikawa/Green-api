<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function area()
    {
        return $this->belongsTo(Prefecture::class);
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
