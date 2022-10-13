<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Contatos extends Model
{

    public function rules()
    {
        return [
            'nome' => 'required',
            'empresa' => 'required',
            'email' => 'required|email',
            'telefone' => 'required',
            'cnpj' =>'required',
            'cidade' => 'required',
            'mensagem' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Nome é obrigatório',
            'empresa.required' => 'Empresa é obrigatória',
            'email.required' => 'E-mail é obrigatório',
            'cnpj.required' => 'CPF/CNPJ é obrigatório',
            'email.email' => 'E-mail nao é valido',
            'mensagem.required' => 'Mensagem é obrigatória',
            'telefone.required' => 'Telefone é obrigatório',
            'cidade.required' => 'Cidade é obrigatório',
        ];
    }
}
