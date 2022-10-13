<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Certificados extends Model
{

    protected $fillable = [
        'titulo',
        'imagem'
    ];

    public $timestamps = false;

    public function rules()
    {
        return [
            'titulo' => 'required|max:100',
            'imagem' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'Título é obrigatório',
            'imagem.required' => 'Imagem é obrigatório',
        ];
    }
}
