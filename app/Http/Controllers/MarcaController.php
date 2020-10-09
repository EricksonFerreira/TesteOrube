<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Marca;
use Storage;
use File;

class MarcaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $nome = 'Marcas';
        $valor = Marca::paginate(50);
        return view('/admin/marca/index',compact('nome','valor'));
    }

    public function create()
    {
        return view('/admin/marca/add-edit-marca');
    }

    public function store(Request $request)
    {
        $validar = $request->validate([
            'nome'    =>  'required | max:50 | unique:marcas,nome',
        ],[
            'nome.required' => 'Este campo é obrigatório',
            'nome.max' => 'Digite no máximo 50 caracteres neste campo',
            'nome.unique' => 'Já existe um tipo de automóvel com esse nome',
        ]);


        // imagem
        $file = $request->file('imagem');

        // Adicionando dados
        $marca = new Marca;
        $marca->nome = $request['nome'];
        $marca->imagem = $file->store('public/mrc');
        $marca->save();

        /*Voltando para a pagina de adicionar postagens*/
        $message = 'Marca cadastrada com Sucesso!';
        return redirect('/marca')->with('success',$message);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $marca = Marca::where('id', $id)->first();
        return view('/admin/marca/add-edit-marca', compact('marca'));
    }

    public function update(Request $request, $id)
    {
        $validar = $request->validate([
            'nome'    =>  'required | max:50 | unique:marcas,nome',
        ],[
            'nome.required' => 'Este campo é obrigatório',
            'nome.max' => 'Digite no máximo 50 caracteres neste campo',
            'nome.unique' => 'Já existe um tipo de automóvel com esse nome',
        ]);


        // imagem
        $file = ($request->file('imagem') == null) ? '' : $request->file('imagem');

        // Adicionando dados
        $marca = Marca::where('id',$id)->first();
        $marca->nome = $request['nome'];
        $marca->imagem = ($file == '')? $marca->imagem : $file->store('public/mrc');
        $marca->save();

        /*Voltando para a pagina de marcas */
        $message = 'Marca editada com Sucesso!';
        return redirect('/marca')->with('success',$message);
    }

    public function destroy($id)
    {
        // Consultando as tabelas
        $marca = Marca::where('id',$id)->first();
        $file =Storage::delete($marca->imagem);
        $marca->delete();
        $message = 'Marca foi excluída com Sucesso!';
        return redirect('/marca')->with('success',$message);
    }

}
