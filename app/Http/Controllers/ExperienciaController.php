<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use Illuminate\Http\Request;

class ExperienciaController extends Controller
{
    public function index(Experiencia $experiencia)
    {
        return view('experiencias.index',['experiencias'=>$experiencia->all()])->with(['mensagemSucesso'=>session('mensagem.sucesso'),'pageTitle'=>'Experiências']);
    }
    public function edit(Experiencia $experiencia)
    {
        return view('experiencias.edit',['experiencia'=>$experiencia])->with('pageTitle',"Editar '$experiencia->vaga'");
    }
    public function store(Experiencia $experiencia, Request $request) 
    {
        $experiencia->create($request->all());
        return view('experiencias.index')->with('mensagem.sucesso',"Experiência '$experiencia->vaga' adicionada");
    }
    public function update(Experiencia $experiencia, Request $request)
    {
        $troca = Experiencia::where('ordem',$request->ordem)->first();
        if(!isset($troca) && $request->ordem < $experiencia->ordem){
            $experiencia->update($request->all()); 
            return redirect()->route('experiencias.index')->with('mensagem.sucesso',"Experiência '$troca->empresa' atualizada");
        }elseif(isset($troca)){  
            $experiencia->update($troca->makeHidden('ordem')->toArray());
            $troca->update($request->except('ordem'));
            return redirect()->route('experiencias.index')->with('mensagem.sucesso',"Experiência '$troca->empresa' atualizada");
        }
        return redirect()->route('experiencias.edit',['experiencia'=>$experiencia->id])->withErrors('Atualização não concluida: Não existe o elemento com a Ordem Selecionada');
    }
    public function destroy(Experiencia $experiencia)
    {
       $experiencia->delete();
       return redirect()->route('experiencias.index')->with('mensagem.sucesso',"Experiência '$experiencia->vaga'");
    }
}
