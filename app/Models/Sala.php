<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;
    protected $table = 'salas';
    public $timestamps = false;

    public function cinema(){
        return $this->belongsTo(Cinema::class,'id_cinema');
    }

    public function sessoes(){
        return $this->hasMany(Sessao::class,'id_sala');
    }
}
