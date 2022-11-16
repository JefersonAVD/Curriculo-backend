<?php

namespace App\Http\Controllers;

use App\Models\Escolaridade;
use Illuminate\Http\Request;

class EscolaridadeController extends Controller
{
    public function index(Escolaridade $escolaridade)
    {
        return view('escolaridade.index',['escolaridade'=>$escolaridade->all()])->with(['mensagemSucesso'=>session('mensagem.sucesso'),'pageTitle'=>'Escolaridade']);
    }
    public function edit(Escolaridade $escola)
    {
        return view('escolaridade.edit',['escola'=>$escola])->with('pageTitle',"Editar '$escola->curso'");
    }
    public function store(Request $request)
    {   
        $escolaridade = Escolaridade::create($request->all());
        return redirect()->route('escolaridade.index')->with('mensagem.sucesso',"Escolaridade '$escolaridade->curso' criada");
    }
    public function destroy(Escolaridade $escola)
    {
        $escola->delete();
        return redirect()->route('escolaridade.index')->with('mensagem.sucesso',"Escolaridade '$escola->curso' deletada");
    }
    public function update(Escolaridade $escola,Request $request)
    {
        $escola->update($request->all());
        return redirect()->route('escolaridade.index')->with('mensagem.sucesso',"Escolaridade '$escola->curso' atualizada");
    }
}
