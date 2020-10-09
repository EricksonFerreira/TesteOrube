<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Automovel;
use App\Marca;
use App\TipoAutomovel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }
    public function inicio()
    {
        $automoveis = Automovel::all();
        $marcas = Marca::paginate(9);
        $tipos = TipoAutomovel::all();
        return view('index',compact('automoveis','marcas','tipos'));
    }
}
