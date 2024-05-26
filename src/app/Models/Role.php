<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'manager', 'managed_shop_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop', 'managed_shop_id');
    }
}
