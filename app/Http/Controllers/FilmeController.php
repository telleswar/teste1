<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Cidade;
use App\Models\Cinema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FilmeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->isPj){
            return redirect('/');
        }

        $msg = '';
        if (isset($request->msg)) {
            $msg = $request->msg;
        }

        $ListaFilmes = Filme::all();

        return(view('Filmes.index',compact('ListaFilmes','msg')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return(view('Filmes.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagePath = '';
        if ($request->hasFile('image')){
            $imagePath = $request->image->store('filmes');
        }

        $filme = new Filme();
        $filme->titulo = $request->titulo;
        $filme->capa = $imagePath;
        $filme->ano_lanc = $request->ano_lanc;
        $filme->classificacao = $request->classificacao;
        $filme->categorias = $request->categorias;
        $filme->save();

        $msg = 'sucesso';
        return redirect()->route('filmes.ver',compact('msg'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Filme  $filme
     * @return \Illuminate\Http\Response
     */
    public function show(Filme $filme)
    {
        $Cidades = Cidade::get(['id','nome','uf']);
        if (session('cidade')){
            $Cinemas = Cinema::get()->where('id_cidade', session('cidade')->id);
        }else{
            $Cinemas = Cinema::get();
        }

        return view('Filmes.show',compact('Cidades','filme','Cinemas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Filme  $filme
     * @return \Illuminate\Http\Response
     */
    public function edit(Filme $filme)
    {
        if(!Auth::user()->isPj){
            return redirect('/');
        }

        return view('Filmes.edit',compact('filme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Filme  $filme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filme $filme)
    {
        $imagePath = $filme->capa;
        if ($request->hasFile('image')){

            if($filme->capa && Storage::exists($filme->capa)){
                Storage::delete($filme->capa);
            }

            $imagePath = $request->image->store('filmes');
        }

        $filme->titulo = $request->titulo;
        $filme->ano_lanc = $request->ano_lanc;
        $filme->capa = $imagePath;
        $filme->classificacao = $request->classificacao;
        $filme->categorias = $request->categorias;
        $filme->save();

        $msg = 'edit_sucesso';
        return redirect()->route('filmes.ver',compact('msg'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Filme  $filme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filme $filme)
    {
        if(!Auth::user()->isPj){
            return redirect('/');
        }

        if($filme->capa && Storage::exists($filme->capa)){
            Storage::delete($filme->capa);
        }

        $filme->delete();
        $msg = 'dlt_sucesso';
        return redirect()->route('filmes.ver',compact('msg'));
    }
}
