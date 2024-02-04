<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplement extends Product
{
    protected $primaryKey = 'product_id';
    public $table = 'supplements';
    use HasFactory;
    protected $fillable = ['product_id', 'quantity']; 

}
