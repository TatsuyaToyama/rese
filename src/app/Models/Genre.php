<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $fillable = ['genre'];
    public function shop_genre()
{
    return $this->hasMany(Shop::class, 'genre_id');
}

}
