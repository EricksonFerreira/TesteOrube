<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Automovel;
use App\Marca;
use App\TipoAutomovel;
use Storage;
use Auth;

class AutomovelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $nome = 'Automóvel';
        $valor = Automovel::paginate(50);
        return view('/admin/automovel/index',compact('nome','valor'));
    }

    public function create()
    {
        $marcas = Marca::all();
        $tipos = TipoAutomovel::all();
        return view('/admin/automovel/add-edit-automovel',compact('marcas','tipos'));
    }

    public function store(Request $request)
    {
        $validar = $request->validate([
            'modelo'         =>  'required | max:250',
            'placa'          =>  'required | max:20',
            'ano_fabricacao' =>  'required | max:10',
            'ano_modelo'     =>  'required | max:10',
            'cor'            =>  'required | max:20',
            'portas'         =>  'required | max:10',
            'valor'          =>  'required | max:20',
            'descricao'      =>  'required | max:255',
        ],[
            'modelo.required' => 'Este campo é obrigatório',
            'modelo.max' => 'Digite no máximo 25 caracteres neste campo',
            'placa.required' => 'Este campo é obrigatório',
            'placa.max' => 'Digite no máximo 20 caracteres neste campo',
            'ano_fabricacao.required' => 'Este campo é obrigatório',
            'ano_fabricacao.max' => 'Digite no máximo 10 caracteres neste campo',
            'ano_modelo.required' => 'Este campo é obrigatório',
            'ano_modelo.max' => 'Digite no máximo 10 caracteres neste campo',
            'cor.required' => 'Este campo é obrigatório',
            'cor.max' => 'Digite no máximo 20 caracteres neste campo',
            'portas.required' => 'Este campo é obrigatório',
            'portas.max' => 'Digite no máximo 10 caracteres neste campo',
            'valor.required' => 'Este campo é obrigatório',
            'valor.max' => 'Digite no máximo 20 caracteres neste campo',
            'descricao.required' => 'Este campo é obrigatório',
            'descricao.max' => 'Digite no máximo 255 caracteres neste campo',
        ]);

        // imagem
        $file = ($request->file('imagem') == null)? '' : $request->file('imagem');

        // Adicionando dados
        $automovel = new Automovel;
        $this->save($automovel, $file, $request);

        /*Voltando para a pagina de adicionar postagens*/
        $message = 'Automóvel cadastrado com Sucesso!';
        return redirect('/automovel')->with('success',$message);
    }

    public function show($id)
    {
        $automovel = Automovel::where('id',$id)->first();
        $tipo = TipoAutomovel::where('id',$automovel->tipoAuto_id)->first();
        $marca = Marca::where('id',$automovel->marca_id)->first();
        $nome = 'Modelo: '.$automovel->modelo;
        return view('/admin/automovel/show',compact('automovel','marca','tipo','nome'));
    }

    public function edit($id)
    {
        $marcas = Marca::all();
        $tipos = TipoAutomovel::all();
        $automovel = Automovel::where('id',$id)->first();
        return view('/admin/automovel/add-edit-automovel',compact('automovel','marcas','tipos'));
    }

    public function update(Request $request, $id)
    {
        $validar = $request->validate([
            'modelo'         =>  'required | max:250',
            'placa'          =>  'required | max:20',
            'ano_fabricacao' =>  'required | max:10',
            'ano_modelo'     =>  'required | max:10',
            'cor'            =>  'required | max:20',
            'portas'         =>  'required | max:10',
            'valor'          =>  'required | max:20',
            'descricao'      =>  'required | max:255',
        ],[
            'modelo.required' => 'Este campo é obrigatório',
            'modelo.max' => 'Digite no máximo 25 caracteres neste campo',
            'placa.required' => 'Este campo é obrigatório',
            'placa.max' => 'Digite no máximo 20 caracteres neste campo',
            'ano_fabricacao.required' => 'Este campo é obrigatório',
            'ano_fabricacao.max' => 'Digite no máximo 10 caracteres neste campo',
            'ano_modelo.required' => 'Este campo é obrigatório',
            'ano_modelo.max' => 'Digite no máximo 10 caracteres neste campo',
            'cor.required' => 'Este campo é obrigatório',
            'cor.max' => 'Digite no máximo 20 caracteres neste campo',
            'portas.required' => 'Este campo é obrigatório',
            'portas.max' => 'Digite no máximo 10 caracteres neste campo',
            'valor.required' => 'Este campo é obrigatório',
            'valor.max' => 'Digite no máximo 20 caracteres neste campo',
            'descricao.required' => 'Este campo é obrigatório',
            'descricao.max' => 'Digite no máximo 255 caracteres neste campo',
        ]);

        // imagem
        $file = $request->file('imagem') == null ? '' : $request->file('imagem');

        // Adicionando dados
        $automovel = Automovel::where('id', $id)->first();
        $this->save($automovel, $file, $request);

        /*Voltando para a pagina de adicionar postagens*/
        $message = 'Automóvel cadastrado com Sucesso!';
        return redirect('/automovel')->with('success',$message);
    }

    public function destroy($id)
    {
        // Consultando as tabelas
        $automovel = Automovel::where('id',$id)->first();
        $file = Storage::delete($automovel->imagem);
        $automovel->delete();

        $message = 'Automovel foi excluída com Sucesso!';
        return redirect('/automovel')->with('success',$message);
    }

    private function save($automovel, $imagem, Request $request){
        $automovel->modelo = $request['modelo'];
        $automovel->placa = $request['placa'];
        $automovel->ano_fabricacao = $request['ano_fabricacao'];
        $automovel->ano_modelo = $request['ano_modelo'];
        $automovel->cor = $request['cor'];
        $automovel->portas = $request['portas'];
        $automovel->valor = $request['valor'];
        $automovel->descricao = $request['descricao'];
        $automovel->imagem = ($imagem == '')? $automovel->imagem : $imagem->store('public/auto');
        $automovel->user_id = Auth::id();
        $automovel->marca_id = $request['marca'];
        $automovel->tipoAuto_id = $request['tipoAuto'];
        $automovel->save();

    }
}
