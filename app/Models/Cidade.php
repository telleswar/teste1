<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $table = 'cidades';
    public $timestamps = false;


    public function cinemas(){
        return $this->hasMany(Cinema::class,'id_cidade');
    }
}
