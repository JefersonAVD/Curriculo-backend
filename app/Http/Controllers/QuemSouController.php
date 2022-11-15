<?php

namespace App\Http\Controllers;

use App\Models\Textos;
use App\Models\QuemSou;
use Illuminate\Http\Request;
use App\Repositories\QuemSouRepository;
use App\Http\Requests\QuemSouFormRequest;

class QuemSouController extends Controller
{
    public function __construct(private QuemSouRepository $titulo)
    {
        # code...
    }
    public function index()
    {
        $info = QuemSou::all();
        return view('quemsou.index',['info'=>$info])->with(['mensagemSucesso'=>session('mensagem.sucesso'),'pageTitle'=>'Quem Sou']);
    }
    public function store(QuemSouFormRequest $request)
    {
        $titulo = $this->titulo->addTitulo($request);
        return redirect()->route('quemsou.index')->with('mensagem.sucesso',"Título '{$titulo}' Adicionado");
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
        return view('quemSou.Textos.index',['linha'=>$linha])->with('pageTitle',"Textos de '$linha->titulo'");
    }

    public function textoStore(QuemSouFormRequest $request)
    {
        $this->titulo->addTexto($request);
        return redirect()->route('texto.index',['linha'=>$request->linha])->with('mensagem.sucesso',"Conteúdo Adicionado");
    }

    public function textoDestroy(Request $request)
    {
        $texto = Textos::find($request->id);
        $texto->delete();
        return redirect()->route('texto.index',['linha'=>$request->linha]);
    }
}
