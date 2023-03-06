<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Models\Cinema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalaController extends Controller
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

        $ListaSalas = $cinema->salas;

        return(view('Salas.index',compact('ListaSalas','msg','cinema')));
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
            return redirect( Route('salas.ver',['cinema' => $cinema->id, 'msg' => $msg]));
        }

        return(view('Salas.create',compact('cinema')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sala = new Sala();
        $sala->nome_sala = $request->nome;
        $sala->id_cinema = $request->id_cinema;
        $sala->save();

        $msg = 'sucesso';
        return redirect( Route('salas.ver',['cinema' => $sala->id_cinema, 'msg' => $msg]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function show(Sala $sala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function edit(Sala $sala)
    {
        if(!Auth::user()->isPj){
            return redirect('/');
        }else if($sala->cinema->id_user !== Auth::user()->id){
            $msg = 'sem_perm';
            return redirect( Route('salas.ver',['cinema' => $sala->id_cinema, 'msg' => $msg]));
        }

        $cinema = $sala->cinema;
        return(view('Salas.edit',compact('cinema', 'sala')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sala $sala)
    {
        $sala->nome_sala = $request->nome;
        $sala->save();
        $msg = 'edit_sucesso';
        return redirect( Route('salas.ver',['cinema' => $sala->id_cinema, 'msg' => $msg]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sala $sala)
    {
        if(!Auth::user()->isPj){
            return redirect('/');
        }else if($sala->cinema->id_user !== Auth::user()->id){
            $msg = 'sem_perm';
            return redirect( Route('salas.ver',['cinema' => $sala->id_cinema, 'msg' => $msg]));
        }

        $id_cinema = $sala->id_cinema;
        $sala->delete();
        $msg = 'dlt_sucesso';
        return redirect( Route('salas.ver',['cinema' => $id_cinema, 'msg' => $msg]));
    }
}
