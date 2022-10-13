<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Textos;
use App\Models\Painel\Textos_imagens;
use Illuminate\Support\Facades\Storage;

class TextosController extends Controller
{

    private $textos;

    public function __construct(Textos $textos)
    {
        $this->textos = $textos;
    }

    public function index()
    {
        $textos = $this->textos->orderBy('updated_at', 'desc')->paginate(6);
        foreach ($textos as $texto) {
            $texto['data_alterada'] = $texto['updated_at']->format('d/m/Y ' . 'H:i:s');
        }
        return view('Painel.textos.index', compact('textos'));
    }

    public function view($id)
    {

        $texto = Textos::findOrFail($id);
        $imagens = Textos::find($id)->imagens;

        if ($texto['descricao'] == null) {
            $texto['descricao'] = 'Sem descrição';
        }

        $texto['data_criacao'] = $texto['created_at']->format('d/m/Y ' . 'H:i:s');
        $texto['data_update'] = $texto['updated_at']->format('d/m/Y ' . 'H:i:s');

        return view('Painel.textos.view', compact('texto', 'imagens'));
    }

    public function edit($id)
    {
        $texto = Textos::findOrFail($id);
        $imagens = Textos::find($id)->imagens;

        return view('Painel.textos.edit', compact('texto', 'imagens'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->textos->rules(), $this->textos->messages());

        $link = $request->titulo;
        $titulo_novo = strtolower(preg_replace("/[ -]+/", "-", strtr(utf8_decode(trim($link)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"), "aaaaeeiooouuncAAAAEEIOOOUUNC-")));

        $texto = Textos::findOrFail($id);
        $texto->titulo = $request->titulo;
        $texto->descricao = $request->descricao;
        $texto->link = $titulo_novo;

        $texto->save();
        return redirect()->action('Painel\TextosController@index')->with('success', 'Texto editado com sucesso!');
    }

    public function galeria($id)
    {
        $images = Textos::find($id)->imagens;
        $textos = Textos::findOrFail($id);
        return view('Painel.textos.galeria', compact('textos', 'images'));
    }

    public function fileStore(Request $request)
    {
        $cod = $request->codigo;
        $nome = $request->nome;
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(storage_path('app/public/fotos2'), $imageName);

        $imageUpload = new Textos_imagens();
        $imageUpload->arquivo = $imageName;
        $imageUpload->nome = $nome;
        $imageUpload->cod_texto = $cod;
        $imageUpload->save();
        return response()->json(['success' => $imageName]);
    }


    public function destroyFoto($id)
    {

        $imagem = Textos_imagens::find($id);

        if ($imagem->delete()) {
            Storage::delete("foto2/{$imagem->arquivo}"); // tr

            return redirect()->back()->with('success', 'A foto foi removida com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Falha ao deletar!');
        }
    }
}
