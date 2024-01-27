<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $primaryKey = 'dni';

    public function admin()
    {
        return $this->hasOne(Admin::class, 'dni', 'dni');
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'dni', 'dni');
    }
}
