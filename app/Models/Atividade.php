<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Atividade extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'urlIcone','nome','descricao'
    ];

    public function setUrlIconeAttribute(UploadedFile $document)
    {
        $this->attributes['urlIcone'] = $document->store('atividades_icones','public');
    }
}
