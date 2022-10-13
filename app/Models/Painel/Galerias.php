<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Galerias extends Model
{

    protected $fillable = ['titulo', 'cod_categoria', 'descricao'];

    public function rules()
    {
        return [
            'titulo' => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'Titulo.required' => 'Titulo é obrigatório',
        ];
    }
}
