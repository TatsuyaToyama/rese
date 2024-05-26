<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = ['area'];
    public function shop_area()
{
    return $this->hasMany(Shop::class, 'area_id');
}
}
