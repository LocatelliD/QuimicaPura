<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Noticias;
use App\Models\Painel\Categoria_galerias;
use App\Models\Painel\Galerias;
use App\Models\Painel\Servicos;
use App\Models\Site\Categoria_galeria;
use App\Models\Site\Galeria;
use Illuminate\Support\Facades\Storage;

class ServicosController extends Controller
{
    private $servico;

    public function __construct(Servicos $servico)
    {
        $this->servicos = $servico;
    }

    public function index()
    {
        $servicos = $this->servicos->all();

        foreach ($servicos as $dado) {

            $dado['data_alterada'] = $dado['updated_at']->format('d/m/Y ' . 'H:i:s');
        }

        return view('Painel.servicos.index')->with('dados', $servicos);
    }

    public function create()
    {
        return view('Painel.servicos.create');
    }

    public function store(Request $request, Servicos $servicos)
    {

        $this->validate($request, $this->servicos->rules(), $this->servicos->messages());

        $link = $request->name;
        $titulo_novo = strtolower(preg_replace("/[ -]+/", "-", strtr(utf8_decode(trim($link)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"), "aaaaeeiooouuncAAAAEEIOOOUUNC-")));

        $servicos = new Servicos;
        $servicos->titulo = $request->titulo;
        $servicos->descricao = $request->descricao;
        $servicos->legislacao = $request->legislacao;
        $servicos->link = $titulo_novo;
        $servicos->save();

        return redirect()->action('Painel\ServicosController@index')->with('success', 'Serviço inserido com sucesso!');
    }

    public function view($id)
    {
        $servico = Servicos::findOrFail($id);

        //$imagens = Galerias::find($id)->imagens;
        $imagens = Galerias::where('cod_categoria', '=', $id)->get();


        //$produto['descricao'] = mb_strimwidth($produto['descricao'], 0, 100, " ...");
        $servico['data_criacao'] = $servico['created_at']->format('d/m/Y ' . 'H:i:s');
        $servico['data_update'] = $servico['updated_at']->format('d/m/Y ' . 'H:i:s');

        return view('Painel.servicos.view', compact('servico', 'imagens'));
    }

    public function edit($id)
    {
        $servico = Servicos::findOrFail($id);
        $imagens = Servicos::find($id)->imagens;
        return view('Painel.servicos.edit', compact('servico', 'imagens'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->servicos->rules(), $this->servicos->messages());

        $link = $request->titulo;
        $titulo_novo = strtolower(preg_replace("/[ -]+/", "-", strtr(utf8_decode(trim($link)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"), "aaaaeeiooouuncAAAAEEIOOOUUNC-")));

        $servico = Servicos::findOrFail($id);
        $servico->titulo = $request->titulo;
        $servico->descricao = $request->descricao;
        $servico->legislacao = $request->legislacao;
        $servico->link = $titulo_novo;

        $servico->save();
        return redirect()->action('Painel\ServicosController@index')->with('success', 'Serviço editado com sucesso!');
    }


    public function galeria($id)
    {
        $images = Servicos::find($id)->imagens;
        $servicos = Servicos::findOrFail($id);
        return view('Painel.servicos.galeria', compact('servicos', 'images'));
    }


    public function fileStore(Request $request)
    {
        $cod = $request->codigo;
        $servico = $request->servico;
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(storage_path('app/public/servicos'), $imageName);

        $imageUpload = new Galerias();
        $imageUpload->imagem = $imageName;
        $imageUpload->titulo = $servico;
        $imageUpload->cod_categoria = $cod;
        $imageUpload->save();
        return response()->json(['success' => $imageName]);
    }


    public function destroyFoto(Request $request, $id)
    {
        $imagem = Galerias::find($id);

        if ($imagem->delete()) {
            Storage::delete("servicos/{$imagem->imagem}"); // tr

            return redirect()->back()->with('success', 'A foto foi removida com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Falha ao deletar!');
        }
    }

    public function destroy($id)
    {
        $servico = Servicos::find($id);
        $imagens = Servicos::find($id)->imagens;
        if ($servico->delete()) {
            foreach ($imagens as $imagem) {
                Storage::delete("servicos/{$imagem->imagem}"); // tr
                $imagem->delete();
            }
            return redirect()->action('Painel\ServicosController@index')->with('success', 'Serviço foi removido com sucesso!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Falha ao deletar!');
        }
    }
}
