<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Portfolio extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'portfolio';
    protected $fillable = [
        'ordem','titulo','tag','url','imagem'
    ];

    public function setImagemAttribute(UploadedFile $file)
    {
        $this->attributes['imagem'] = $file->store('portfolio_imagens','public');
    }
}
