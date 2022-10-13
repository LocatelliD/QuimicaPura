<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Servicos extends Model
{

    protected $fillable = [
        'titulo',
        'legislacao',
        'descricao'
    ];

    public function imagens()
    {
        return $this->HasMany('App\Models\Painel\Galerias', 'cod_categoria');
    }

    public function rules()
    {
        return [
            'titulo' => 'required|max:100',
            'descricao' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'Título é obrigatório',
            'descricao.required' => 'Descrição é obrigatório',
        ];
    }
}
