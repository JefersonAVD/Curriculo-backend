<?php

namespace App\Repositories;

use App\Models\Textos;
use App\Models\QuemSou;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\QuemSouFormRequest;

class EloquentQuemSouRepository implements QuemSouRepository
{
    public function addTitulo(QuemSouFormRequest $request) : string
    {
        DB::beginTransaction();
        $titulo = QuemSou::create($request->all())->titulo;
        DB::commit();
        return $titulo;
    }

    public function addTexto(QuemSouFormRequest $request):Textos
    {
        DB::beginTransaction();
        $texto = Textos::create(['conteudo'=>$request->conteudo,'linha_id'=>$request->linha]);
        DB::commit();
        return $texto;
    }
}