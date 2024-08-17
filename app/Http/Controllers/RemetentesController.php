<?php

namespace App\Http\Controllers;
use App\Models\Remetente;
use Illuminate\Http\Request;
use App\Http\Controllers\ImportacaoController;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\IOFactory;

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

            if($request->Acao == "Adicionar"){
                Remetente::create($data);
                $mensagem = 'Remetente Adicionado com Sucesso';
            }else{
                if($request->file('Arquivo')){
                    $planilha = $request->file("Arquivo");
                    $spreadsheet = IOFactory::load($planilha->getRealPath());
                    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
                    // Processa os dados da planilha
                    $count = 0;
                    foreach ($sheetData as $row) {
                        if($row['A'] != "Nome"){
                            if(!Remetente::where('Email',$row['B'])->exists()){
                                Remetente::create(array("Titulo"=>$row['A'],"Email"=>$row['B'],"IDInstituicao"=>Auth::user()->IDInstituicao));
                                $count++;
                            }
                        }
                    }
                    $mensagem = $count.' Remetentes Importados com Sucesso';
                }
            }
            
            //Modelo::create($data);
            $aid = '';
            
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
                $item[] = date('d/m/Y', strtotime($r->created_at));
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
