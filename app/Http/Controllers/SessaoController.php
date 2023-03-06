<?php

namespace App\Http\Controllers;

use App\Models\Sessao;
use App\Models\Cinema;
use App\Models\Filme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Cinema $cinema)
    {
        if(!Auth::user()->isPj){
            return redirect('/');
        }else if($cinema->id_user !== Auth::user()->id){
            $msg = 'sem_perm';
            return redirect( Route('cinemas.ver',compact('msg')));
        }

        $msg = '';
        if (isset($request->msg)) {
            $msg = $request->msg;
        }

        $ListaSessoes = $cinema->sessoes;

        return(view('Sessoes.index',compact('ListaSessoes','msg','cinema')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cinema $cinema)
    {
        if(!Auth::user()->isPj){
            return redirect('/');
        }else if($cinema->id_user !== Auth::user()->id){
            $msg = 'sem_perm';
            return redirect( Route('sessoes.ver',['cinema' => $cinema->id, 'msg' => $msg]));
        }

        $ListaFilmes = Filme::all('id','titulo');

        return(view('Sessoes.create',compact('cinema','ListaFilmes')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sessao = new Sessao();
        $sessao->id_cinema = $request->id_cinema;
        $sessao->id_filme = $request->id_filme;
        $sessao->id_sala = $request->id_sala;
        $sessao->tipo = $request->tipo;
        $sessao->data = $request->data;
        $sessao->hora_inicio = $request->hora_inicio;
        $sessao->hora_termino = $request->hora_termino;
        $sessao->save();

        $msg = 'sucesso';

        return redirect( Route('sessoes.ver',['cinema' => $sessao->id_cinema, 'msg' => $msg]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sessao  $sessao
     * @return \Illuminate\Http\Response
     */
    public function show(Sessao $sessao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sessao  $sessao
     * @return \Illuminate\Http\Response
     */
    public function edit(Sessao $sessao)
    {
        if(!Auth::user()->isPj){
            return redirect('/');
        }else if($sessao->cinema->id_user !== Auth::user()->id){
            $msg = 'sem_perm';
            return redirect( Route('sessoes.ver',['cinema' => $sessao->id_cinema, 'msg' => $msg]));
        }

        $cinema = $sessao->cinema;
        $ListaFilmes = Filme::all('id','titulo');
        return(view('Sessoes.edit',compact('cinema', 'sessao','ListaFilmes')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sessao  $sessao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sessao $sessao)
    {
        $sessao->id_filme = $request->id_filme;
        $sessao->id_sala = $request->id_sala;
        $sessao->tipo = $request->tipo;
        $sessao->data = $request->data;
        $sessao->hora_inicio = $request->hora_inicio;
        $sessao->hora_termino = $request->hora_termino;
        $sessao->save();

        $msg = 'edit_sucesso';

        return redirect( Route('sessoes.ver',['cinema' => $sessao->id_cinema, 'msg' => $msg]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sessao  $sessao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sessao $sessao)
    {
        if(!Auth::user()->isPj){
            return redirect('/');
        }else if($sessao->cinema->id_user !== Auth::user()->id){
            $msg = 'sem_perm';
            return redirect( Route('sessoes.ver',['cinema' => $sessao->id_cinema, 'msg' => $msg]));
        }

        $id_cinema = $sessao->id_cinema;
        $sessao->delete();
        $msg = 'dlt_sucesso';
        return redirect( Route('sessoes.ver',['cinema' => $id_cinema, 'msg' => $msg]));
    }
}
