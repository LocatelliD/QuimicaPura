<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Textos extends Model
{

    protected $fillable = [
        'titulo',
        'descricao'
    ];

    public function imagens()
    {
        return $this->HasMany('App\Models\Painel\Textos_imagens', 'cod_texto');
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
