<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use App\Models\Genre;
use App\Models\like;

class Shop extends Model
{
    use HasFactory;
    public function area()
    {
        return $this->belongsTo('App\Models\Area', 'area_id');
    }
    public function genre()
    {
        return $this->belongsTo('App\Models\Genre', 'genre_id');
    }

    public function book_shop()
    {
        return $this->hasMany(book::class, 'shop_id');
    }

    public function likes()
    {
        return $this->hasMany(like::class, 'shop_id');
    }

    public function likes_user($user_id)
    {
        return $this->hasMany(like::class, 'shop_id');
    }


    


}
