<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    protected $table = 'cinemas';
    public $timestamps = false;

    public function cidade(){
        return $this->belongsTo(Cidade::class,'id_cidade');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function salas(){
        return $this->hasMany(Sala::class,'id_cinema');
    }

    public function sessoes(){
        return $this->hasMany(Sessao::class,'id_cinema');
    }

}
