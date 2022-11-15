<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuemSou extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $with = ['texto'];

    protected $fillable = [
        'id','titulo'
    ];

    public $timestamps= false;

    public $table = 'quemsou';

    public function texto()
    {
        return $this->hasMany(Textos::class,'linha_id');
    }
}
