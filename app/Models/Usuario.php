<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'password',
        'admin'
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = false;

    protected $casts = [
        'admin'=>'boolean'
    ];
}
