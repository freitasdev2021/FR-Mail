<?php

namespace App\Http\Controllers;
use App\Models\Lista;
use App\Http\Controllers\EnviosController;
use Illuminate\Support\Facades\Auth;
use App\Models\Remetente;
use Illuminate\Http\Request;

class RelatoriosController extends Controller
{

    public const submodulos = array([
        "nome" => 'Envios',
        'rota' => 'Envios/index',
        'endereco' => 'index'
    ],[
        "nome" => 'Relatorios',
        'rota' => 'Envios/Relatorios/index',
        'endereco' => 'Relatorios'
    ]);

    public function index(){
        return view('Relatorios.index',[
            "submodulos"=> self::submodulos,
            "Listas" => Lista::select('id','Nome')->where('IDInstituicao',Auth::user()->IDInstituicao)->get(),
            "Remetentes" => Remetente::select('id','Email')->where('IDInstituicao',Auth::user()->IDInstituicao)->get()
        ]);
    }

    public function getRelatorios(){
        $SQL = "SELECT em.Titulo,em.Email,";
    }
}
