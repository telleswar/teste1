<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Models\Filme;

class HomeController extends Controller
{
    public function index()
    {
        $Cidades = Cidade::get(['id','nome','uf']);
        if (session('cidade')){
            $Filmes = Filme::get();
        }else{
            $Filmes = Filme::get();
        }

        return view('home',compact('Cidades','Filmes'));
    }

    public function set_cidade(Request $request, Cidade $cidade){
        $request->session()->put('cidade',$cidade);
        return redirect()->back();
    }
}
