<?php

namespace App\Http\Controllers;

use App\Models\Recibo;
use App\Models\Sessao;
use App\Models\Tipo_ingresso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReciboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isPj){
            return redirect()->back();
        }

        $ListaRecibos = Recibo::get()->where('id_user',Auth::user()->id);
        return(view('Recibos.index',compact('ListaRecibos')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Sessao $sessao)
    {
        if(Auth::user()->isPj){
            return redirect()->back();
        }

        $tipo_ingressos = Tipo_ingresso::get()->where('tipo',$sessao->tipo);

        return view('Recibos.create',compact('sessao','tipo_ingressos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->isPj){
            return redirect()->back();
        }

        $recibo = new Recibo();
        $recibo->id_user = Auth::user()->id;
        $recibo->id_sessao = $request->id_sessao;
        $recibo->id_tipo_ingresso = $request->tipo_ingresso;
        $recibo->id_tipo_ingresso = $request->tipo_ingresso;
        $recibo->cadeira = $request->cadeira;
        $recibo->forma_pagamento = $request->forma_pagamento;
        $recibo->data = now();
        $recibo->hora = now();
        $recibo->save();

        return redirect()->action([ReciboController::Class,'index'])->with('msg', 'Compra realizada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recibo  $recibo
     * @return \Illuminate\Http\Response
     */
    public function show(Recibo $recibo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recibo  $recibo
     * @return \Illuminate\Http\Response
     */
    public function edit(Recibo $recibo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recibo  $recibo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recibo $recibo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recibo  $recibo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recibo $recibo)
    {
        //
    }
}
