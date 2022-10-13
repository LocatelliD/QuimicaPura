<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Produtos_imagens extends Model {

    protected $fillable = [
        'arquivo',
        'cod_produto'
    ];
    public $timestamps = false;

}
