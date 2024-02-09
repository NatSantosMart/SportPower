<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $primaryKey = 'dni';
    public $incrementing = false;

    public function person()
    {
        return $this->belongsTo(Person::class, 'dni', 'dni');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'dni_admin', 'dni');
    }
}
