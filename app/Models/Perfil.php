<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $primaryKey= 'id';
    public $timestamps = false;
    protected $table = 'perfil';
    public $fillable = ['tipo','conteudo','id'];
}
