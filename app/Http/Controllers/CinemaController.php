<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Cidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!Auth::user()->isPj){
            return redirect('/');
        }

        $msg = '';
        if (isset($request->msg)) {
            $msg = $request->msg;
        }

        $ListaCinemas = Auth::user()->cinemas;

        return(view('Cinemas.index',compact('ListaCinemas','msg')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ListaCidades = Cidade::all();
        return(view('Cinemas.create',compact('ListaCidades')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Cinema = new Cinema();
        $Cinema->nome = $request->nome;
        $Cinema->cnpj = $request->cnpj;
        $Cinema->endereco = $request->endereco;
        $Cinema->id_cidade = $request->cidade;
        $Cinema->id_user = Auth::user()->id;
        $Cinema->is_matriz = $request->tipo;
        $Cinema->save();
        $msg='sucesso';
        return redirect()->route('cinemas.ver',compact('msg'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Http\Response
     */
    public function show(Cinema $cinema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Http\Response
     */
    public function edit(Cinema $cinema)
    {
        if ($cinema->id_user !== Auth::user()->id) {
            $msg = "sem_perm";
            return redirect()->route('cinemas.ver',compact('msg'));
        }
        $ListaCidades = Cidade::all();
        return view('Cinemas.edit',compact('cinema','ListaCidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cinema $cinema)
    {
        if ($cinema->id_user !== Auth::user()->id) {
            $msg = "sem_perm";
            return redirect()->route('cinemas.ver',compact('msg'));
        }

        $cinema->nome = $request->nome;
        $cinema->cnpj = $request->cnpj;
        $cinema->endereco = $request->endereco;
        $cinema->id_cidade = $request->cidade;
        $cinema->is_matriz = $request->tipo;
        $cinema->save();

        $msg = "edit_sucesso";
        return redirect()->route('cinemas.ver',compact('msg'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cinema $cinema)
    {
        if ($cinema->id_user !== Auth::user()->id) {
            $msg = "sem_perm";
            return redirect()->route('cinemas.ver',compact('msg'));
        }

        $cinema->delete();
        $msg = "dlt_sucesso";
        return redirect()->route('cinemas.ver',compact('msg'));
    }
}
