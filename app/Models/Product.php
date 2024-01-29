<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'admin_dni', 'url_image', 'description']; //Super importante!! ()

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_product', 'product_id', 'dni_cliente');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'dni_admin', 'dni');
    }
}
