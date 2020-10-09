<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoAutomovel;


class TipoAutomovelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $nome = 'Tipo de Automóvel';
        $valor = TipoAutomovel::paginate(50);
        return view('/admin/tipo-automovel/index',compact('nome','valor'));
    }

    public function create()
    {
        return view('/admin/tipo-automovel/add-edit-tipoautomovel');
    }

    public function store(Request $request)
    {
        $validar = $request->validate([
            'nome'    =>  ' required | max:50 | unique:tipo_automoveis,nome',
        ],[
            'nome.required' => 'Este campo é obrigatório',
            'nome.max' => 'Digite no máximo 50 caracteres neste campo',
            'nome.unique' => 'Já existe um tipo de automóvel com esse nome',
        ]);

        // Adicionando dados, posteriormente irei adicionar os dados que estão "" caso tenham sido enviados
        $tipoautomovel = new TipoAutomovel;
        $tipoautomovel->nome = $request['nome'];
        $tipoautomovel->save();

        /*Voltando para a pagina de tipos de automoveis */
        $message = 'Tipo de automóvel cadastrado com Sucesso!';
        return redirect('/tipoautomovel')->with('success',$message);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tipoautomovel = TipoAutomovel::where('id', $id)->first();
        return view('/admin/tipo-automovel/add-edit-tipoautomovel', compact('tipoautomovel'));
    }

    public function update(Request $request, $id)
    {
        $validar = $request->validate([
            'nome'    =>  ' required | max:50 | unique:tipo_automoveis,nome',
        ],[
            'nome.required' => 'Este campo é obrigatório',
            'nome.max' => 'Digite no máximo 50 caracteres neste campo',
            'nome.unique' => 'Já existe um tipo de automóvel com esse nome',
        ]);

        // Pegando as informações do id solicitado
        $tipoautomovel = TipoAutomovel::where('id',$id)->first();
        $tipoautomovel->nome = $request['nome'];
        $tipoautomovel->save();

        $message = 'Tipo de automóvel editado com Sucesso!';
        return redirect('/tipoautomovel')->with('success',$message);
    }

    public function destroy($id)
    {
        // Consultando as tabelas
        $tipo = TipoAutomovel::where('id',$id)->first();
        $tipo->delete();

        $message = 'Tipo de automóvel excluído com Sucesso!';
        return redirect('/tipoautomovel')->with('success',$message);
    }
}
