<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AtividadeController extends Controller
{
    public function index(Atividade $atividade)
    {
        return view('atividades.index',['atividades'=>$atividade->all()])->with(['mensagemSucesso'=>session('mensagem.sucesso'),'pageTitle'=>'Atividades']);    
    }
    public function edit(Atividade $atividade)
    {
        return view('atividades.edit',['atividade'=>$atividade])->with('pageTitle',"Editar '$atividade->nome'");
    }
    public function store(Atividade $atividade, Request $request)
    {   
        $atividade->create($request->all());
        return redirect()->route('atividades.index')->with('mensagem.sucesso',"Atividade '$atividade->nome' adicionada");
    }
    public function update(Atividade $atividade, Request $request)
    {
        $atividade->update($request->all());
        return redirect()->route('atividades.index')->with('mensagem.sucesso',"Atividade '$atividade->nome' editada");
    }
    public function destroy(Atividade $atividade)
    {
        Storage::disk('public')->delete($atividade->urlIcone);
        $atividade->delete();
        return redirect()->route('atividades.index')->with('mensagem.sucesso',"Atividade '$atividade->nome' excluída");
    }
}
