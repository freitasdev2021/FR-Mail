<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;
use App\Models\Lista;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EmailsController extends Controller
{
    public const submodulos = array([
        "nome" => 'Contatos',
        'rota' => 'Contatos/index',
        'endereco' => 'index'
    ],[
        "nome" => 'Listas',
        'rota' => 'Contatos/Listas/index',
        'endereco' => 'Listas'
    ]);
    public function index(){
        return view('Emails.index',[
            "submodulos"=> self::submodulos,
            "Listas" => Lista::select('id','Nome')->where('IDInstituicao',Auth::user()->IDInstituicao)->get()
        ]);
    }

    public function indexListas(){
        return view('Emails.listas',[
            "submodulos"=> self::submodulos
        ]);
    }

    public function saveListas(Request $request){
        try{
            $data = $request->all();
            $data['IDInstituicao'] = Auth::user()->IDInstituicao;
            if($request->id){
                $aid = $request->id;
                Lista::find($request->id)->update($data);
                $rota = 'Contatos/Listas/Edit';
            }else{
                Lista::create($data);
                $rota = 'Contatos/Listas/Novo';
                $aid = "";
            }
            $status = "success";
            $mensagem = "Salvamento Realizado";
        }catch(\Throwable $th){
            $aid = '';
            $mensagem = 'Erro: '.$th->getMessage();
            $status = 'error';
            $rota = 'Contatos/Listas/Novo';
        }finally{
            return redirect()->route($rota,$aid)->with($status,$mensagem);
        }
    }

    public function save(Request $request){
        try{
            $data = $request->all();
            $data['IDInstituicao'] = Auth::user()->IDInstituicao;

            if($request->Acao == "Adicionar"){
                Email::create($data);
                $mensagem = 'Contatos Adicionado com Sucesso';
            }else{
                if($request->file('Arquivo')){
                    $planilha = $request->file("Arquivo");
                    $spreadsheet = IOFactory::load($planilha->getRealPath());
                    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
                    // Processa os dados da planilha
                    $count = 0;
                    foreach ($sheetData as $row) {
                        if($row['A'] != "Nome"){
                            if(!Email::where('Email',$row['B'])->exists()){
                                Email::create(array("Nome"=>$row['A'],"Email"=>$row['B'],"IDInstituicao"=>Auth::user()->IDInstituicao,"IDLista"=>$request->IDLista));
                                $count++;
                            }
                        }
                    }
                    $mensagem = $count.' Contatos Importados com Sucesso';
                }
            }
            
            //Modelo::create($data);
            $aid = '';
            
            $status = 'success';
            $rota = 'Contatos/index';
        }catch(\Throwable $th){
            $aid = '';
            $mensagem = 'Erro: '.$th->getMessage();
            $status = 'error';
            $rota = 'Contatos/index';
        }finally{
            //dd($data);
            return redirect()->route($rota,$aid)->with($status,$mensagem);
        }
    }

    public function getContatos(){
        $IDInstituicao = Auth::user()->IDInstituicao;
        $registros = DB::select("SELECT e.Nome,e.Email,e.created_at,CASE WHEN e.IDLista = 0 THEN 'Sem Lista Definida' ELSE l.Nome END as Lista FROM emails e LEFT JOIN listas l ON(l.id = e.IDLista) WHERE e.IDInstituicao = $IDInstituicao");
        if(count($registros) > 0){
            foreach($registros as $r){
                $item = [];
                $item[] = $r->Nome;
                $item[] = $r->Email;
                $item[] = $r->Lista;
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

    public function getEmailsLista($IDLista){
        $registros = Email::where("IDLista",$IDLista)->get();
        if(count($registros) > 0){
            foreach($registros as $r){
                $item = [];
                $item[] = $r->Nome;
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

    public function lista($id=null){

        $view = array(
            "submodulos"=> self::submodulos,
            'id' => ''
        );

        if($id){
            $view['id'] = $id;
        }

        return view('Emails.cadastroLista',$view);
    }

    public function getListas(){
        $registros = Lista::where("IDInstituicao",Auth::user()->IDInstituicao)->get();
        if(count($registros) > 0){
            foreach($registros as $r){
                $item = [];
                $item[] = $r->Nome;
                $item[] = $r->DSLista;
                $item[] = "<a href=".route('Contatos/Listas/Edit',$r->id).">Abrir</a>";
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
