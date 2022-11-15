<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Textos extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable=[
        'conteudo','linha_id'
    ];

    public function belong()
    {
        return $this->belongsTo(QuemSou::class);
    }
}
