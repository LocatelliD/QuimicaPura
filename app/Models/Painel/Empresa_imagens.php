<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Empresa_imagens extends Model {

    protected $fillable = [
        'arquivo',
        'cod_empresa'
    ];
    public $timestamps = false;

}
