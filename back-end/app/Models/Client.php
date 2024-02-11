<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $primaryKey = 'dni';
    public $incrementing = false;
    protected $fillable = ['dni', 'phone', 'city', 'address', 'email', 'password', 'name', 'surnames'];

    public function person()
    {
        return $this->belongsTo(Person::class, 'dni', 'dni');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'dni_cliente', 'dni');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'client_product', 'dni_cliente', 'product_id');
    }
}
