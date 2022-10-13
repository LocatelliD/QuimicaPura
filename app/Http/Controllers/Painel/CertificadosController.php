<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Painel\Certificados;

class CertificadosController extends Controller
{
    private $certificados;

    public function __construct(Certificados $certificados)
    {
        $this->certificados = $certificados;
    }

    public function index()
    {
        $certificados = Certificados::all();
        return view('Painel.certificados.index')->with('dados', $certificados);
    }

    public function edit($id)
    {
        $certificados = Certificados::findOrFail($id);
        return view('Painel.certificados.edit')->with('certificado', $certificados);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->certificados->rules(), $this->certificados->messages());

        $image = $request->imagem;
        $imageName = $image->getClientOriginalName();
        $certificado = Certificados::findOrFail($id);
        $certificado->titulo = $request->titulo;
        $certificado->imagem = $imageName;

        $certificado->save();

        if ($request->imagem) {
            $image->move(storage_path('app/public/certificados'), $imageName);
        }

        return redirect()->action('Painel\CertificadosController@index')->with('success', 'Certificados editado com sucesso!');
    }

    public function create()
    {
        return view('Painel.certificados.create');
    }

    public function store(Request $request, Certificados $certificado)
    {

        $this->validate($request, $this->certificados->rules(), $this->certificados->messages());

        $image = $request->imagem;
        $imageName = $image->getClientOriginalName();
        $certificados = new Certificados;
        $certificados->titulo = $request->titulo;
        $certificados->imagem = $imageName;
        $certificados->save();

        return redirect()->action('Painel\CertificadosController@index')->with('success', 'Certificado inserido com sucesso!');
    }

    public function destroy($id)
    {
        $certificados = Certificados::find($id);
        $img = $certificados->imagem;

        if ($certificados->delete()) {

            Storage::delete("certificados/{$img}"); // tr
           
            return redirect()->action('Painel\CertificadosController@index')->with('success', 'Certificado foi removido com sucesso!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Falha ao deletar!');
        }
    }
}
