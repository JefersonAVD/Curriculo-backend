<?php

use App\Http\Middleware\CrudBlock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\QuemSouController;
use App\Http\Controllers\AtividadeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ExperienciaController;
use App\Http\Controllers\EscolaridadeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
    //return view('welcome');
    //return view('main/index');
//});


Route::prefix('/login')->controller(LoginController::class)->group(function (){
    Route::get('/','index')->name('login.index');
    Route::post('/enter','enter')->name('login.enter');
    Route::get('/cadastrar','add')->name('login.add');
    Route::post('/salvar','store')->name('login.store');
    Route::get('/visitante','guest')->name('login.guest');
    Route::get('/sair','exit')->name('login.exit');
});
    
Route::get('/', function(){
    if(Auth::check())return redirect()->back();
    return redirect()->route('login.index');
});

Route::middleware(CrudBlock::class)->group( function (){
    Route::prefix('/perfil')->controller(PerfilController::class)->group(function(){
        Route::get('/','index')->name('perfil.index');
        Route::get('/{perfil}','edit')->name('perfil.edit');
        Route::delete('/delete/{perfil}','destroy')->name('perfil.destroy');
        Route::post('/salvar','store')->name('perfil.store');
        Route::post('/atualizar/{perfil}','update')->name('perfil.update');
    });
    
    Route::prefix('/quem-sou')->controller(QuemSouController::class)->group(function(){
        Route::get('/{linha}/textos','textoIndex')->name('texto.index');
        Route::post('/{linha}/salvar','textoStore')->name('texto.store');
        Route::delete('/{linha}/deletar/{id}','textoDestroy')->name('texto.destroy');
    
        Route::get('/','index')->name('quemsou.index');
        Route::get('/{titulo}','edit')->name('quemsou.edit');
        Route::post('/salvar','store')->name('quemsou.store');
        Route::delete('/delete/{titulo}','destroy')->name('quemsou.destroy');
        Route::post('/atualizar/{titulo}','update')->name('quemsou.update');
    });
    
    Route::prefix('/portfolio')->controller(PortfolioController::class)->group(function(){
        Route::get('/','index')->name('portfolio.index');
        Route::get('/{site}','edit')->name('portfolio.edit');
        Route::post('/salvar','store')->name('portfolio.store');
        Route::post('/{site}/atualizar','update')->name('portfolio.update');
        Route::delete('/{site}/delete','destroy')->name('portfolio.destroy');
    });
    Route::prefix('/cursos')->controller(CursoController::class)->group(function(){
        Route::get('/','index')->name('cursos.index');
        Route::get('/{curso}','edit')->name('cursos.edit');
        Route::post('/salvar','store')->name('cursos.store');
        Route::post('/{curso}/atualizar','update')->name('cursos.update');
        Route::delete('/{curso}/delete','destroy')->name('cursos.destroy');
    });
    Route::prefix('/experiencias')->controller(ExperienciaController::class)->group(function(){
        Route::get('/','index')->name('experiencias.index');
        Route::get('/{experiencia}','edit')->name('experiencias.edit');
        Route::post('/salvar','store')->name('experiencias.store');
        Route::post('/{experiencia}/atualizar','update')->name('experiencias.update');
        Route::delete('/{experiencia}/delete','destroy')->name('experiencias.destroy');
    });
    Route::prefix('/escolaridade')->controller(EscolaridadeController::class)->group(function(){
        Route::get('/','index')->name('escolaridade.index');
        Route::get('/{escola}','edit')->name('escolaridade.edit');
        Route::post('/salvar','store')->name('escolaridade.store');
        Route::post('/{escola}/atualizar','update')->name('escolaridade.update');
        Route::delete('/{escola}/delete','destroy')->name('escolaridade.destroy');
    });
    Route::prefix('/atividades')->controller(AtividadeController::class)->group(function(){
        Route::get('/','index')->name('atividades.index');
        Route::get('/{atividade}','edit')->name('atividades.edit');
        Route::post('/salvar','store')->name('atividades.store');
        Route::post('/{atividade}/atualizar','update')->name('atividades.update');
        Route::delete('/{atividade}/delete','destroy')->name('atividades.destroy');
    });
});


