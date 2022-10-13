<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Textos_imagens extends Model {

    protected $fillable = ['NOME', 'cod_textp', 'arquivo'];
    public $timestamps = false;
}
