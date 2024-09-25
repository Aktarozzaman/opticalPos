<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imei extends Model
{
    protected $guarded = ['id'];
    
    public function product()
    {
        return $this->belongsTo(\App\Product::class, 'product_id');
    }
}
