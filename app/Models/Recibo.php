<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    use HasFactory;

    protected $table = 'recibos';
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sessao(){
        return $this->belongsTo(Sessao::class,'id_sessao');
    }

    public function tipo_ingresso(){
        return $this->belongsTo(Tipo_ingresso::class,'id_tipo_ingresso');
    }
}
