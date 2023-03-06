<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_ingresso extends Model
{
    use HasFactory;

    protected $table = 'tipo_ingresso';
    public $timestamps = false;

    public function recibos(){
        return $this->hasMany(Recibo::class,'id_tipo_ingresso');
    }
}
