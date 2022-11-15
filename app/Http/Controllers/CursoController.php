<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(Curso $cursos)
    {
        return view('cursos.index',['cursos'=>$cursos->all()])->with(['mensagemSucesso'=>session('mensagem.sucesso'),'pageTitle'=>'Cursos']);
    }
    public function store(Curso $curso, Request $request)
    {
        $curso->create($request->all());
        return redirect()->route('cursos.index')->with('mensagem.sucesso',"Curso '$curso->titulo' adicionado");
    }
    public function edit(Curso $curso)
    {
        return view('cursos.edit',['curso'=>$curso])->with('pageTitle',"Editar '$curso->nome'");
    }
    public function update(Curso $curso, Request $request)
    {   

        $troca = Curso::where('ordem',$request->ordem)->first();
        if(!isset($troca) && $request->ordem < $curso->ordem){
            $curso->update($request->all());
            return redirect()->route('cursos.index')->with('mensagem.sucesso',"Curso '$curso->nome' atualizado");
        }elseif(isset($troca)){
            $curso->update($troca->makeHidden('ordem')->toArray());
            $troca->update($request->except('ordem'));
            return redirect()->route('experiencias.index')->with('mensagem.sucesso',"Curso '$curso->nome' atualizado");
        }
        return redirect()->route('cursos.edit',$curso->id)->withErrors('Não foi possivel atualizar. O valor da Ordem não existe');
    }
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')->with('mensagem.sucesso',"Curso '$curso->nome' deletado");
    }

}
