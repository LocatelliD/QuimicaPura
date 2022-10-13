<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Painel\Endereco_sites;

class ContatosController extends Controller {

    private $contatos;

    public function __construct(Endereco_sites $contatos) {
        $this->contatos = $contatos;
    }

    public function index() {
        $contatos = Endereco_sites::all();

        return view('Painel.contatos.index', compact('contatos'));
    }

    public function view($id) {
        $contato = Endereco_sites::findOrFail($id);
        return view('Painel.contatos.view', compact('contato'));
    }

    public function create() {
        return view('Painel.contatos.create');
    }

    public function edit($id) {
        $contato = Endereco_sites::findOrFail($id);
        return view('Painel.contatos.edit', compact('contato'));
    }

    public function update(Request $request, $id) {
        $nameLogo = null;
        $nameIcone = null;
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->logo->extension();
            $nameLogo = "{$name}.{$extension}";
            $upload = $request->logo->storeAs('endereco_site', $nameLogo);
            if ($upload) {
                Storage::delete("endereco_site/{$request->logo_old}");
            } elseif (!$upload) {
                return redirect()->back()->with('error', 'Falha ao fazer upload')->withInput();
            }
        }
        if ($request->hasFile('icone') && $request->file('icone')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->icone->extension();
            $nameIcone = "{$name}.{$extension}";
            $upload = $request->icone->storeAs('endereco_site', $nameIcone);
            if ($upload) {
                Storage::delete("endereco_site/{$request->icone_old}");
            } elseif (!$upload) {
                return redirect()->back()->with('error', 'Falha ao fazer upload')->withInput();
            }
        }
        $this->validate($request, $this->contatos->rules(), $this->contatos->messages());

        $info = Endereco_sites::findOrFail($id);
        $info->nome = $request->nome;
        $info->endereco = $request->endereco;
        $info->bairro = $request->bairro;
        $info->cep = $request->cep;
        $info->cidade = $request->cidade;
        $info->estado = $request->estado;
        $info->telefone = $request->telefone;
        $info->telefone_2 = $request->telefone_2;
        $info->cod_latitude = $request->latitude;
        $info->cod_longitude = $request->longitude;
        $info->link_linkedin = $request->link_linkedin;
        $info->link_facebook = $request->link_facebook;
        $info->link_twitter = $request->link_twitter;
        if ($nameIcone)
            $info->img_icone = $nameIcone;

        if ($nameLogo)
            $info->img_logo = $nameLogo;

        $info->save();

        return redirect()->action('Painel\ContatosController@index')->with('success', ' Informação alterada com sucesso!');
    }

}
