<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model {

    protected $fillable = [
        'titulo',
        'status',
        'descricao'
    ];

    public function imagens() {
        return $this->HasMany('App\Models\Painel\Empresas_imagens', 'cod_empresa');
    }

    public function rules() {
        return [
            'titulo' => 'required|max:100',
            'descricao' => 'required',
        ];
    }

    public function messages() {
        return [
            'titulo.required' => 'Título é obrigatório',
            'descricao.required' => 'Descrição é obrigatório',
        ];
    }

}
