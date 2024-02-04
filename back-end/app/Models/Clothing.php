<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clothing extends Product
{
    protected $primaryKey = 'product_id';
    public $table = 'clothes';
    use HasFactory;
    protected $fillable = ['product_id', 'gender', 'size', 'color']; 
}
