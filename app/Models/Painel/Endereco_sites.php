<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Endereco_sites extends Model {

    public function rules() {
        return [
        'nome' => 'required|max:100',
        'endereco' => 'required',
        'bairro' => 'required',
        'cep' => 'required',
        'cidade' => 'required',
        'estado' => 'required',
        'telefone' => 'required',
        'telefone_2' => 'required',
        'latitude' => 'required',
        'longitude' => 'required',
        ];
    }

    public function messages() {
        return [
            'nome.required' => 'Nome não informado',
            'endereco.required' => 'Endereço não informado',
            'bairro.required' => 'Bairro não informado',
            'cidade.required' => 'Cidade não informada',
            'estado.required' => 'Estado não informado',
            'cep.required' => 'Cep não informado',
            'telefone.required' => 'Telefone não informado',
            'telefone_2.required' => 'Telefone não informado',
            'latitude.required' => 'Latitude não informada',
            'longitude.required' => 'Longitude não informada',
        ];
    }

}
