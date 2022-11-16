<?php

namespace App\Http\Controllers;

use App\Models\Textos;
use App\Models\QuemSou;
use Illuminate\Http\Request;

class QuemSouController extends Controller
{
    public function index(QuemSou $info)
    {
        return view('quemSou.index',['info'=>$info->all()])->with(['mensagemSucesso'=>session('mensagem.sucesso'),'pageTitle'=>'Quem Sou']);
    }
    public function store(Request $request)
    {
        $QuemSou = QuemSou::create($request->all());
        return redirect()->route('quemsou.index')->with('mensagem.sucesso',"Título '{$QuemSou->titulo}' Adicionado");
    }

    public function destroy(QuemSou $titulo)
    {
        $titulo->delete();
        return redirect()->route('quemsou.index')->with('mensagem.sucesso',"Titulo '{$titulo->titulo}' deletado com sucesso");
    }
    public function edit(QuemSou $titulo){
        return view('quemSou.edit',['quemsou'=>$titulo])->with('pageTitle',"Editar titulo '$titulo->titulo'");
    }

    public function update(QuemSou $titulo)
    {
        $titulo->update();
        return redirect()->route('quemsou.index')->with('mensagem.sucesso',"Titulo '{$titulo->titulo}' atualizado com sucesso");
    }

    public function textoIndex(Request $request)
    {
        $linha = QuemSou::with('texto')->find($request->linha);
        return view('quemSou.textos.index',['linha'=>$linha])->with('pageTitle',"Textos de '$linha->titulo'");
    }

    public function textoStore(Request $request)
    {
        Textos::create($request->except('_token'));
        return redirect()->route('texto.index',['linha'=>$request->linha])->with('mensagem.sucesso',"Conteúdo Adicionado");
    }

    public function textoDestroy(Request $request)
    {
        $texto = Textos::find($request->id);
        $texto->delete();
        return redirect()->route('texto.index',['linha'=>$request->linha]);
    }
}
