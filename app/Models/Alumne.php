<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumne extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'correu', 'adreça', 'ciutat', 'pais', 
        'telefon', 'master_id'
    ];

    public function master()
    {
        return $this->belongsTo(Master::class);
    }
}
