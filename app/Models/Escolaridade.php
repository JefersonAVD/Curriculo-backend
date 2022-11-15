<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escolaridade extends Model
{
    use HasFactory;

    protected $primaryKey= 'id';
    public $timestamps = false;
    protected $table = 'escolaridade';
    
    protected $fillable = ['curso','anoFormacao', 'instituicao', 'descricao'];
}
