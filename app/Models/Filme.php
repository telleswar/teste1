<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

    protected $table = 'filmes';
    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'ano_lanc',
        'classificacao',
        'categorias',
        'capa',
    ];

    public function sessoes(){
        return $this->hasMany(Sessao::class,'id_filme');
    }
}

