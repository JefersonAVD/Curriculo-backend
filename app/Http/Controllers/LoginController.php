<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()) return redirect()->back();
        return view('login.index');
    }
    public function store(Usuario $user, Request $request)
    {
        $dados = $request->all();
        $dados['admin'] = false;
        $dados['password'] = Hash::make($dados['password']);

        $user->create($dados);
    }
    public function add()
    {
        return view('login.add');
    }
    public function enter(Request $request)
    {
        if(!Auth::attempt($request->only('nome','password'))) return redirect()->route('login.index')->withErrors("Senha ou Login não existem");
        return redirect()->route('quemsou.index');
    }
    public function guest()
    {
        $credencial = ['nome'=>'visitante', 'password'=>'visitante'];
        Auth::attempt($credencial);
        return redirect()->route('quemsou.index');
    }
    public function exit()
    {
        
        Auth::logout();
        return redirect()->route('login.index')->with('permission',false);
    }
}
