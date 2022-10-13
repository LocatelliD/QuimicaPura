<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Categoria_galerias extends Model {

    protected $fillable = ['name', 'status', 'cod_categoria', 'descricao'];
    protected $dates = ['created_at', 'updated_at'];

    // public function imagens() {
    //     return $this->HasMany('App\Models\Painel\Produtos_imagens', 'cod_produto');
    // }

    // public function rules() {
    //     return [
    //         'name' => 'required|max:100',
    //         'descricao' => 'required',
    //         'cod_categoria' => 'required',
    //     ];
    // }

    // public function messages() {
    //     return [
    //         'name.required' => 'Nome é obrigatório',
    //         'descricao.required' => 'Descrição é obrigatório',
    //         'cod_categoria.required' => 'Categoria é obrigatório',
    //     ];
    // }

}
