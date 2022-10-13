<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model {

    public function imagens() {
        return $this->HasMany('App\Models\Painel\Empresas_imagens', 'cod_empresa');
    }

}
