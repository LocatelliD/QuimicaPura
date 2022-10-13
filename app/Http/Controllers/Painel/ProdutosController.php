<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Produtos;
use App\Models\Painel\Produtos_imagens;
use App\Models\Painel\CategoriasProduto;
use Illuminate\Validation\Validator;
use App\Http\Requests\ProdutoRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use File;

class ProdutosController extends Controller {

    private $produtos;

    public function __construct(Produtos $produtos) {
        $this->produtos = $produtos;
    }

    public function index() {
        $produtos = $this->produtos->orderBy('updated_at', 'desc')->paginate(6);
        $categorias = CategoriasProduto::all();

        foreach ($produtos as $produto) {
            foreach ($categorias as $categoria) {
                if ($categoria->id == $produto->cod_categoria) {
                    $produto->categoria = $categoria->categoria;
                }
            }
            if ($produto['status'] == 1) {
                $produto['status'] = "Ativo";
            } else {
                $produto['status'] = "Inativo";
            }

            $produto['descricao'] = mb_strimwidth($produto['descricao'], 0, 50, " ...");
            $produto['data_alterada'] = $produto['updated_at']->format('d/m/Y ' . 'H:i:s');
        }

        return view('Painel.produtos.index')->with('dados', $produtos);
    }

    public function create() {
        $categorias = CategoriasProduto::all();
        return view('Painel.produtos.create', compact('categorias'));
    }

    public function store(Request $request, Produtos $produto) {

        $this->validate($request, $this->produtos->rules(), $this->produtos->messages());

        $link = $request->name;
        $titulo_novo = strtolower(preg_replace("/[ -]+/", "-", strtr(utf8_decode(trim($link)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"), "aaaaeeiooouuncAAAAEEIOOOUUNC-")));

        $product = new Produtos;
        $product->name = $request->name;
        $product->status = $request->status;
        $product->descricao = $request->descricao;
        $product->cod_categoria = $request->cod_categoria;
        $product->link = $titulo_novo;
        $product->save();
        return redirect()->action('Painel\ProdutosController@index')->with('success', 'Produto inserido com sucesso!');
    }

    public function view($id) {
        $produto = Produtos::findOrFail($id);
        $categorias = CategoriasProduto::all();

        $imagens = Produtos::find($id)->imagens;
        foreach ($categorias as $categoria) {
            if ($categoria->id == $produto->cod_categoria) {
                $produto->categoria = $categoria->categoria;
            }
        }
        if ($produto['status'] == 1) {
            $produto['status'] = "Ativo";
        } else {
            $produto['status'] = "Inativo";
        }

        //$produto['descricao'] = mb_strimwidth($produto['descricao'], 0, 100, " ...");
        $produto['data_criacao'] = $produto['created_at']->format('d/m/Y ' . 'H:i:s');
        $produto['data_update'] = $produto['updated_at']->format('d/m/Y ' . 'H:i:s');

        return view('Painel.produtos.view', compact('produto', 'imagens'));
    }

    public function edit($id) {
        $produto = Produtos::findOrFail($id);
        $categorias = CategoriasProduto::all();
        $imagens = Produtos::find($id)->imagens;
        return view('Painel.produtos.edit', compact('produto', 'categorias', 'imagens'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, $this->produtos->rules(), $this->produtos->messages());

        $link = $request->name;
        $titulo_novo = strtolower(preg_replace("/[ -]+/", "-", strtr(utf8_decode(trim($link)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"), "aaaaeeiooouuncAAAAEEIOOOUUNC-")));

        $product = Produtos::findOrFail($id);
        $product->name = $request->name;
        $product->status = $request->status;
        $product->cod_categoria = $request->cod_categoria;
        $product->descricao = $request->descricao;
        $product->link = $titulo_novo;

        $product->save();
        return redirect()->action('Painel\ProdutosController@index')->with('success', 'Produto editado com sucesso!');
    }

    public function destroy($id) {
        $produto = Produtos::find($id);
        $imagens = Produtos::find($id)->imagens;
        if ($produto->delete()) {
            foreach ($imagens as $imagem) {
                Storage::delete("produtos/{$imagem->arquivo}"); // tr
            }
            return redirect()->action('Painel\ProdutosController@index')->with('success', 'Produto foi removido com sucesso!');
        } else {
            return redirect()
                            ->back()
                            ->with('error', 'Falha ao deletar!');
        }
    }

    public function galeria($id) {
        $images = Produtos::find($id)->imagens;
        $produtos = Produtos::findOrFail($id);
        return view('Painel.produtos.galeria', compact('produtos', 'images'));
    }

    public function fileStore(Request $request) {
        $cod = $request->codigo;
        $produto = $request->produto;
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(storage_path('app/public/produtos'), $imageName);

        $imageUpload = new Produtos_imagens();
        $imageUpload->arquivo = $imageName;
        $imageUpload->nome = $produto;
        $imageUpload->cod_produto = $cod;
        $imageUpload->save();
        return response()->json(['success' => $imageName]);
    }

    public function fileDestroy(Request $request) {
        $filename = $request->get('filename');
        Produtos_imagens::where('arquivo', $filename)->delete();
        $path = storage_path() . '/app/public/produtos/' . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

    public function destroyFoto($id) {

        $imagem = Produtos_imagens::find($id);

        if ($imagem->delete()) {
            Storage::delete("produtos/{$imagem->arquivo}"); // tr

            return redirect()->back()->with('success', 'A foto foi removida com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Falha ao deletar!');
        }
    }

}
