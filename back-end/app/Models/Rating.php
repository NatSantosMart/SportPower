<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $primaryKey = 'comment_id';
    protected $fillable = ['comment_id', 'score', 'product_id']; 

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function comment()
    {
        return $this->belongsTo(Product::class, 'comment_id', 'id');
    }
}
