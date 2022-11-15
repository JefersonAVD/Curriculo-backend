<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index(Portfolio $portfolio)
    {  
        return view('portfolio.index',['portfolios'=>$portfolio->all()])->with(['mensagemSucesso'=>session('mensagem.sucesso'),'pageTitle'=>'Portfólio']);
    }
    public function store(Request $request)
    {
        $portfolio = Portfolio::create($request->except('_token'));
        
        return redirect()->route('portfolio.index',$portfolio)->with('mensagem.sucesso',"Portfólio '$portfolio->titulo' adicionado");
    }
    public function edit(Portfolio $site)
    {
        return view('portfolio.edit',['site'=>$site])->with('pageTitle',$site->titulo);
    }
    public function update(Portfolio $site, Request $request)
    {
        $trocando = Portfolio::where('ordem',$request->ordem)->first();
        if(!isset($troca) && $request->ordem < $site->ordem){
            $site->update($request->all());
            return redirect()->route('portfolio.index')->with('mensagem.sucesso',"Site '$site->titulo' atualizado");
        }elseif(isset($troca)){
            $site->update($trocando->makeHidden('ordem')->toArray());
            $trocando->update($request->except('ordem'));
            return redirect()->route('portfolio.index')->with('mensagem.sucesso',"Site '$site->titulo' atualizado");
        }
        return redirect()->route('portfolio.edit',$site->id)->withErrors('Não foi possivel atualizar. O valor da Ordem não existe');
    }
    public function destroy(Portfolio $site)
    {
        Storage::disk('public')->delete($site->imagem);
        $site->delete();
        return redirect()->route('portfolio.index')->with('mensagem.sucesso',"Site '$site->titulo' excluido");
    }
}
