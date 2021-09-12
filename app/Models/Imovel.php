<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    protected $table = 'imoveis';

    protected $fillable = [
        'codigo',
        'tipo',
        'pretensao',
        'titulo',
        'detalhes',
        'quartos',
        'valor'
    ];

}
