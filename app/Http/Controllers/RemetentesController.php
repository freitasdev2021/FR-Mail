<?php

namespace App\Http\Controllers;
use App\Models\Remetente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RemetentesController extends Controller
{

    public const submodulos = array([
        "nome" => 'Remetentes',
        'rota' => 'Remetentes/index',
        'endereco' => 'index'
    ]);

    public function index(){
        return view('Remetentes.index',[
            "submodulos" => self::submodulos
        ]);
    }

    public function save(Request $request){
        try{
            $data = $request->all();
            $data['IDInstituicao'] = Auth::user()->IDInstituicao;
            // if($request->file('Arquivo')){
            //     $Foto = $request->file('Arquivo')->getClientOriginalName();
            //     $request->file('Arquivo')->storeAs('modelos',$Foto,'public');
            // }

            if($request->Acao == "Adicionar"){
                Remetente::create($data);
            }else{
                //rotina de importação
            }
            
            //Modelo::create($data);
            $aid = '';
            $mensagem = 'Remetentes Importados com Sucesso';
            $status = 'success';
            $rota = 'Remetentes/index';
        }catch(\Throwable $th){
            $aid = '';
            $mensagem = 'Erro: '.$th->getMessage();
            $status = 'error';
            $rota = 'Remetentes/index';
        }finally{
            //dd($data);
            return redirect()->route($rota,$aid)->with($status,$mensagem);
        }
    }

    public function getRemetentes(){
        $registros = Remetente::where('IDInstituicao',Auth::user()->IDInstituicao)->get();
        if(count($registros) > 0){
            foreach($registros as $r){
                $item = [];
                $item[] = $r->Titulo;
                $item[] = $r->Email;
                $itensJSON[] = $item;
            }
        }else{
            $itensJSON = [];
        }
        
        $resultados = [
            "recordsTotal" => intval(count($registros)),
            "recordsFiltered" => intval(count($registros)),
            "data" => $itensJSON 
        ];
        
        echo json_encode($resultados);
    }
}
