<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessao extends Model
{
    use HasFactory;
    protected $table = 'sessoes';
    public $timestamps = false;

    public function cinema(){
        return $this->belongsTo(Cinema::class,'id_cinema');
    }

    public function filme(){
        return $this->belongsTo(Filme::class,'id_filme');
    }

    public function sala(){
        return $this->belongsTo(Sala::class,'id_sala');
    }

    public function recibos(){
        return $this->hasMany(Recibo::class,'id_sessao');
    }

}
