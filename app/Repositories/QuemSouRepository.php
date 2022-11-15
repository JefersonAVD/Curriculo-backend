<?php

namespace App\Repositories;

use App\Models\Textos;
use App\Http\Requests\QuemSouFormRequest;

interface QuemSouRepository
{
    public function addTitulo(QuemSouFormRequest $request):string;

    public function addTexto(QuemSouFormRequest $request):Textos;
}