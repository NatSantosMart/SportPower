<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'client_dni', 'url_image', 'description']; 

    public function client()
    {
        return $this->belongsTo(Client::class, 'dni_cliente', 'dni');
    }
}
