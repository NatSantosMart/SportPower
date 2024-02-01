<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $primaryKey = 'comment_id';
    protected $fillable = ['comment_id', 'score', 'product_id']; 
}
