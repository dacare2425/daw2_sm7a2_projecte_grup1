<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'hores', 'director'];

    public function alumnes()
    {
        return $this->hasMany(Alumne::class);
    }
}