<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Categoria_galeria extends Model {
    
    public function imagens() {
        return $this->HasMany('App\Models\Painel\Galerias', 'cod_categoria');
    }
}
