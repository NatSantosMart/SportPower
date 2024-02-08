<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplement extends Product
{
    use HasFactory;
    protected $fillable = ['quantity']; 

        //Acceso al producto asociado de un Clothing
        public function product()
        {
            return $this->belongsTo(Product::class, 'product_id', 'id');
        }

}
