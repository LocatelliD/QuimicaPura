<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Models\Site\Endereco_site;
use App\Models\Site\Textos;
use App\Models\Site\Textos_imagens;
use App\Models\Site\Contatos;
use App\Models\Site\Categoria_galeria;
use App\Models\Site\Galeria;
use App\Models\Site\Certificados;
use App\Models\Site\Banners;
use App\Models\Site\Servicos;
use App\Models\Site\Empresas;
use App\Mail\SendMailUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\Site\User;


class SiteController extends Controller
{

    private $contatos;

    public function __construct(Contatos $contatos)
    {
        $this->contatos = $contatos;
    }

    public function index()
    {
        //pega o endereco do site, tem que ter em todas as fucntions!
        $endereco = Endereco_site::all();

        //pega todos os certificados
        $certificados = Certificados::all();

        //pega todos as análises no banco e joga na tela!
        $servicos = Servicos::all();

        //pega 1 foto, em cada tipo de análise e coloca em uma variavel array dentro
        foreach ($servicos as $servico) {
            $vai =  Galeria::where('cod_categoria', '=', $servico['id'])->groupBy('galerias.cod_categoria')->get();

            if (count($vai) == 0) {
            } else {
                $servico['galeria'] = $vai[0];
            }
        }
        
        //pega o texto do servicos
        $texto_servico = Textos::where('id', '=', 14)->get();

        //pega o texto do quem somos
        $texto_lab = Textos::where('id', '=', 11)->get();
        //pega a imagem do texto
        $lab_img = Textos::find($texto_lab[0]->id)->imagens->all();

        //pega o texto do fundo banner e joga no header!
        $texto_fundo = Textos::where('id', '=', 17)->get();


        return view('Site.index')
            ->with('endereco', $endereco[0])
            ->with('lab_img', $lab_img[0])
            ->with('servicos', $servicos)
            ->with('texto_fundo', $texto_fundo[0])
            ->with('texto_lab', $texto_lab[0])
            ->with('texto_servico', $texto_servico[0])
            ->with('certificados', $certificados);
    }

    public function lab()
    {
        $endereco = Endereco_site::all();
        //pega todos os certificados
        $certificados = Certificados::all();
        //pega o texto da qualidade
        $texto = Textos::where('id', '=', 11)->get();

        return view('Site.laboratorio')
            ->with('endereco', $endereco[0])
            ->with('texto', $texto[0])
            ->with('certificados', $certificados);
    }

    public function qualidade()
    {
        $endereco = Endereco_site::all();

        //pega todos os certificados
        $certificados = Certificados::all();

        //pega o texto da CONHEÇA O LABORATÓRIO
        $texto = Textos::where('id', '=', 12)->get();

        //pega as fotos da gategoria, para colocar no carrossel
        $galerias  = Galeria::where('cod_categoria', '=', 7)->get();

        return view('Site.qualidade')
            ->with('endereco', $endereco[0])
            ->with('texto', $texto[0])
            ->with('galerias', $galerias)
            ->with('certificados', $certificados);
    }

    public function quimicapura()
    {
        $endereco = Endereco_site::all();

        //pega o texto da CONHEÇA O LABORATÓRIO
        $texto = Textos::where('id', '=', 13)->get();
        //pega todos os certificados
        $certificados = Certificados::all();
        //pega as fotos da gategoria, para colocar no carrossel
        $galerias  = Galeria::where('cod_categoria', '=', 7)->get();

        return view('Site.quimicapura')
            ->with('endereco', $endereco[0])
            ->with('texto', $texto[0])
            ->with('galerias', $galerias)
            ->with('certificados', $certificados);
    }

    public function certificacoes()
    {
        $endereco = Endereco_site::all();

        //pega o texto da CONHEÇA O LABORATÓRIO
        $texto = Textos::where('id', '=', 13)->get();

        //pega as fotos da gategoria, para colocar no carrossel
        $galerias  = Galeria::where('cod_categoria', '=', 7)->get();

        return view('Site.certificacoes')
            ->with('endereco', $endereco[0])
            ->with('texto', $texto[0])
            ->with('galerias', $galerias);
    }

    //teste servicos
    public function servicos()
    {
        $endereco = Endereco_site::all();
        //pega todos os certificados
        $certificados = Certificados::all();
        //pega o texto da CONHEÇA O LABORATÓRIO
        $texto = Textos::where('id', '=', 14)->get();

        $servicos = Servicos::all();

        foreach ($servicos as $servico) {
            $vai =  Galeria::where('cod_categoria', '=', $servico['id'])->groupBy('galerias.cod_categoria')->get();

            $servico['galeria'] = $vai[0];
        }


        return view('Site.servicos')
            ->with('endereco', $endereco[0])
            ->with('texto', $texto[0])
            ->with('servicos', $servicos)
            ->with('certificados', $certificados);
    }

    //teste servicos
    public function servicos1()
    {
        $endereco = Endereco_site::all();
        //pega todos os certificados
        $certificados = Certificados::all();
        //pega o texto da CONHEÇA O LABORATÓRIO
        $texto = Textos::where('id', '=', 14)->get();
        $servicos = Servicos::all();

        foreach ($servicos as $servico) {
            $vai =  Galeria::where('cod_categoria', '=', $servico['id'])->groupBy('galerias.cod_categoria')->get();

            $servico['galeria'] = $vai[0];
        }


        return view('Site.servicos1')
            ->with('endereco', $endereco[0])
            ->with('texto', $texto[0])
            ->with('servicos', $servicos)
            ->with('certificados', $certificados);
    }

    public function servicosdet($link)
    {
        $endereco = Endereco_site::all();
        //pega todos os certificados
        $certificados = Certificados::all();
        $info = Servicos::where('link', '=', $link)->get();
        $id = $info[0]['id'];

        $galeria = Galeria::where('cod_categoria', '=', $id)->get();

        //   dd($galeria);
        return view('Site.servicosdet')
            ->with('endereco', $endereco[0])
            ->with('info', $info[0])
            ->with('galerias', $galeria)
            ->with('certificados', $certificados);
    }

    public function amostra()
    {
        $endereco = Endereco_site::all();
        //pega todos os certificados
        $certificados = Certificados::all();
        //pega o texto da CONHEÇA O LABORATÓRIO
        $texto = Textos::where('id', '=', 16)->get();

        return view('Site.envie-sua-amostra')
            ->with('endereco', $endereco[0])
            ->with('texto', $texto[0])
            ->with('certificados', $certificados);
    }


    public function enviarMensagem(Request $request, Contatos $contatos, User $user)
    {

        $validator = Validator::make($request->all(), $this->contatos->rules(), $this->contatos->messages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        Mail::to('contato@quimicapura.com.br')->send(new SendMailUser($user));
        return response()->json(['success' => 'E-mail enviado com sucesso!']);
    }
}
