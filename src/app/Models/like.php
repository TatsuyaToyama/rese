<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'shop_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop', 'shop_id');
    }

    public function genre()
    {
        return $this->belongsTo('App\Models\Genre', 'genre_id');
    }

    public function area()
    {
        return $this->belongsTo('App\Models\Area', 'area_id');
    }
}
