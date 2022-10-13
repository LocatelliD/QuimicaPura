<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Textos extends Model {

    public function imagens() {
        return $this->HasMany('App\Models\Site\Textos_imagens', 'cod_texto');
    }

}
