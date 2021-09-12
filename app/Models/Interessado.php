<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interessado extends Model
{
    protected $table = 'interessados';


    protected $fillable = [
        'nome',
        'email'
    ];

    public function interesses(){
        return $this->belongsToMany( Imovel::class,'interesses', 'interessado_id', 'imovel_id');
    }
}



















