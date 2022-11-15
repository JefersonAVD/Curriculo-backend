<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerfilFormRequest;
use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PerfilController extends Controller
{
    public function index(Request $request){
        $info = Perfil::all();
        $mensagem = session('mensagem.sucesso');
        return view('perfil.index',['info'=>$info])->with(['mensagemSucesso'=>$mensagem,'pageTitle'=>'Perfil']);
    }

    public function store(Request $request){
        Validator::make($request->all(),
            ['tipo'=>['min:8','max:20'],'conteudo'=>['min:8','max:200']],
            ['min'=>'No mínimo :min caracteres','max'=>'No máximo :max caracteres']
        )->validate();
        $inputs = $request->input();    
        $request->session()->flash('mensagem.sucesso','Conteúdo Adicionado com Sucesso');
        Perfil::create($inputs);
        return redirect()->route('perfil.index');
    }

    public function edit(Perfil $perfil){
        return view('perfil.edit',['perfil'=>$perfil])->with('pageTitle',"Alterar '$perfil->tipo'");
    }

    public function destroy(int $perfil)
    {
        Perfil::findOrFail($perfil)->delete();
        return redirect()->route('perfil.index')->with('mensagem.sucesso','Conteúdo Removido com Sucesso');
    }
    public function update(Perfil $perfil, PerfilFormRequest $request)
    {
        $perfil->update($request->all());
        $request->session()->flash('mensagem.sucesso','Conteúdo Atualizado com Sucesso');
        return redirect()->route('perfil.index');
    }
}
