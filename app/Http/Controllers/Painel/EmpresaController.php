<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Painel\Empresa;
use App\Models\Painel\Empresa_imagens;
use App\Models\Painel\Endereco_sites;
use App\Models\Site\Endereco_site;

class EmpresaController extends Controller {

    private $empresa;

    public function __construct(Endereco_sites $empresa) {
        $this->empresa = $empresa;
    }

    public function index() {
       $empresa = Endereco_site::all();
        
        return view('Painel.empresa.index', compact('empresa'));
    }

   














    

    public function store(Request $request, Empresas $empresa) {

        $this->validate($request, $this->empresa->rules(), $this->empresa->messages());
        $insert = $empresa->create($request->all());

        if ($insert) {
            return redirect()->action('Painel\EmpresasController@index')->with('success', 'Texto inserido com sucesso!');
        } else {
            // Redireciona de volta com uma mensagem de erro
            return redirect()->back()->with('error', 'Falha ao inserir');
        }
    }

    public function view($id) {
        $empresa = Empresas::findOrFail($id);
        $imagens = Empresas::find($id)->imagens;

        if ($empresa['status'] == 1) {
            $empresa['status'] = "Ativo";
        } else {
            $empresa['status'] = "Inativo";
        }

       // $empresa['descricao'] = mb_strimwidth($empresa['descricao'], 0, 100, " ...");
        $empresa['data_criacao'] = $empresa['created_at']->format('d/m/Y ' . 'H:i:s');
        $empresa['data_update'] = $empresa['updated_at']->format('d/m/Y ' . 'H:i:s');

        return view('Painel.empresas.view', compact('empresa', 'imagens'));
    }

    public function edit($id) {
        $empresa = Empresas::findOrFail($id);
        $images = Empresas::find($id)->imagens;
        return view('Painel.empresas.edit', compact('empresa', 'images'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, $this->empresa->rules(), $this->empresa->messages());

        $info = Empresas::findOrFail($id);
        $info->titulo = $request->titulo;
        $info->status = $request->status;
        $info->descricao = $request->descricao;
      
        $info->save();
        return redirect()->action('Painel\EmpresasController@index')->with('success', ' Informação alterada com sucesso!');
    }

    public function destroy($id) {
        $empresa = Empresas::find($id);
        $imagens = Empresas::find($id)->imagens;
        if ($empresa->delete()) {
            foreach ($imagens as $imagem) {
                Storage::delete("empresas/{$imagem->arquivo}"); // tr
            }
            return redirect()->action('Painel\EmpresasController@index')->with('success', 'O texto foi removido com sucesso!');
        } else {
            return redirect()
                            ->back()
                            ->with('error', 'Falha ao deletar!');
        }
    }

    public function galeria($id) {
        $images = Empresas::find($id)->imagens;
        $empresa = Empresas::findOrFail($id);
        return view('Painel.empresas.galeria', compact('empresa', 'images'));
    }

    public function fileStore(Request $request) {
        $cod = $request->codigo;
        $name = $request->nome;
        
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(storage_path('app/public/empresa'), $imageName);

        $imageUpload = new Empresas_imagens();
        $imageUpload->arquivo = $imageName;
        $imageUpload->nome = $name;
        $imageUpload->cod_empresa = $cod;
        $imageUpload->save();
        return response()->json(['success' => $imageName]);
    }

    public function fileDestroy(Request $request) {
        $filename = $request->get('filename');
        Empresas_imagens::where('arquivo', $filename)->delete();
        $path = storage_path() . '/app/public/empresa/' . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

    public function destroyFoto($id) {

        $imagem = Empresas_imagens::find($id);

        if ($imagem->delete()) {
            Storage::delete("empresa/{$imagem->arquivo}"); // tr

            return redirect()->back()->with('success', 'A foto foi removida com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Falha ao deletar!');
        }
    }

}
