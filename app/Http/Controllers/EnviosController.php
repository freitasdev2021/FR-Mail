<?php

namespace App\Http\Controllers;

use App\Models\Envio;
use App\Models\Email;
use App\Models\Lista;
use App\Models\Remetente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\SMTPController;
use Illuminate\Http\Request;

class EnviosController extends Controller
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
        return view('Envio.index',[
            "submodulos"=> self::submodulos,
            "Listas" => Lista::select('id','Nome')->where('IDInstituicao',Auth::user()->IDInstituicao)->get(),
            "Remetentes" => Remetente::select('id','Email')->where('IDInstituicao',Auth::user()->IDInstituicao)->get()
        ]);
    }

    public function getContatos($IDLista=null){
        $WHERE = "";
        if($IDLista){
            $WHERE = " WHERE IDLista=".$IDLista;
        }
        $registros = DB::select("SELECT 
            e.id,
            e.Nome,
            e.Email,
            e.created_at,
            (SELECT MAX(ev.created_at) 
            FROM envios ev 
            WHERE ev.IDEmail = e.id) as ultima_data_envio,
            CASE WHEN e.IDLista = 0 THEN 'Sem Lista Definida' ELSE l.Nome END as Lista 
        FROM emails e LEFT JOIN listas l ON(l.id = e.IDLista) $WHERE");
        if(count($registros) > 0){
            foreach($registros as $r){
                $item = [];
                $item[] = "<input type='checkbox' name='IDEmail[]' value='$r->id'>";
                $item[] = $r->Nome;
                $item[] = $r->Email;
                $item[] = $r->Lista;
                $item[] = date('d/m/Y', strtotime($r->created_at));
                $item[] = !is_null($r->ultima_data_envio) ? date('d/m/Y', strtotime($r->ultima_data_envio)) : 'Ainda Não Recebeu Mensagens';
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

    public function saveEnvio(Request $request){
        try{
            $dataAnexos = array();
            if($request->file('Anexos')){
                foreach($request->file('Anexos') as $an){
                    $Foto = $an->getClientOriginalName();
                    $an->storeAs('Instituicao_'.Auth::user()->IDInstituicao.'/anexos',$Foto,'public');
                    $dataAnexos[]= array(
                        "Nome" => $Foto,
                        "RealPath" => storage_path('app/public/Instituicao_'.Auth::user()->IDInstituicao.'/anexos/'.$Foto)
                    );
                }
            }
            //dd($dataAnexos);
            $Remetente = Remetente::find($request->IDRemetente)->Email;
            $Para = Email::whereIn('id',$request->IDEmail)->pluck('Email')->toArray();
            $countEnvios = 0;
            SMTPController::sendMass($Remetente,$Para,$request->Assunto,$request->Mensagem,$dataAnexos);
            foreach($request->IDEmail as $ie){
                Envio::create([
                    "IDUser"=> Auth::user()->id,
                    "IDRemetente"=> $request->IDRemetente,
                    "IDInstituicao" => Auth::user()->IDInstituicao,
                    "IDEmail" => $ie,
                    "Assunto" => $request->Assunto,
                    "Mensagem"=> $request->Mensagem,
                    "Hora"=> date('H:i:s'),
                    "Anexos"=> json_encode($dataAnexos)
                ]);
                $countEnvios++;
            }
            $aid = "";
            $mensagem = $countEnvios." Envios Realizados com Sucesso!";
            $rout = "Envios/index";
            $status = "success";
        }catch(\Throwable $th){
            $aid = "";
            $mensagem = $th->getMessage();
            $rout = "Envios/index";
            $status = "error";
        }finally{
            return redirect()->route($rout,$aid)->with($status,$mensagem);
        }
        //dd($dataAnexos);
    }
}
