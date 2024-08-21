<?php

namespace App\Http\Controllers;
use App\Models\Lista;
use App\Http\Controllers\EnviosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
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

    public function export()
    {
        // Realiza a consulta para pegar os registros dos últimos 90 dias
        $SQL = "SELECT em.Email,ev.Assunto,ev.Mensagem,ev.Anexos,rm.Email as Remetente,ev.created_at as DTEnvio FROM envios ev INNER JOIN emails em ON(em.id = ev.IDEmail) INNER JOIN remetentes rm ON(rm.id = ev.IDRemetente) WHERE ev.created_at >= DATE_SUB(CURDATE(), INTERVAL 90 DAY)";
        $registros = DB::select($SQL);
        // Cria uma nova planilha
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Email Destinatário');
        $sheet->setCellValue('B1', 'Assunto');
        $sheet->setCellValue('C1', 'Mensagem');
        $sheet->setCellValue('D1', 'Anexos');
        $sheet->setCellValue('E1', 'Email Remetente');
        $sheet->setCellValue('F1', 'Data de Envio');

        // Preenche a planilha com os dados
        $row = 2;
        foreach ($registros as $registro) {
            $sheet->setCellValue('A' . $row, $registro->Email);
            $sheet->setCellValue('B' . $row, $registro->Assunto);
            $sheet->setCellValue('C' . $row, $registro->Mensagem);
            
            // Decodifica os anexos (assumindo que seja um JSON array)
            $anexos = json_decode($registro->Anexos);
            $anxs = "";
            foreach ($anexos as $anexo) {
                $anxs .= $anexo->Nome.PHP_EOL;
            }

            $sheet->setCellValue('D' . $row, $anxs);

            $sheet->setCellValue('E' . $row, $registro->Remetente);
            $sheet->setCellValue('F' . $row, \Carbon\Carbon::parse($registro->DTEnvio)->format('d/m/Y'));
            $row++;
        }

        // Cria um arquivo Excel e salva-o no servidor temporariamente
        $writer = new Xlsx($spreadsheet);
        $filename = 'registros_ultimos_90_dias.xlsx';
        $path = storage_path('app/public/' . $filename);
        $writer->save($path);

        // Retorna o arquivo para download
        return response()->download($path)->deleteFileAfterSend(true);
    }

    public function getRelatorios(){
        $SQL = "SELECT em.Email,ev.Assunto,ev.Mensagem,ev.Anexos,rm.Email as Remetente,ev.created_at as DTEnvio FROM envios ev INNER JOIN emails em ON(em.id = ev.IDEmail) INNER JOIN remetentes rm ON(rm.id = ev.IDRemetente) WHERE ev.created_at >= DATE_SUB(CURDATE(), INTERVAL 90 DAY)";
        $registros = DB::select($SQL);
        $IDInstituicao = Auth::user()->IDInstituicao;
        if(count($registros) > 0){
            foreach($registros as $r){
                $AnexosJSON = json_decode($r->Anexos);
                // echo "<pre>";
                // print_r($AnexosJSON);
                // echo "</pre>";
                
                $Anexos = "<ul>";
                foreach($AnexosJSON as $aj) {
                    $Anexos .= "<li><a href=\"" . url('storage/Instituicao_'.$IDInstituicao.'/anexos/' . $aj->Nome) . "\" target='_blank'>" . $aj->Nome . "</a></li>";
                }
                $Anexos .= "</ul>";

                $item = [];
                $item[] = $r->Remetente;
                $item[] = $r->Email;
                $item[] = $r->Assunto;
                $item[] = $r->Mensagem;
                $item[] = $Anexos;
                $item[] = date('d/m/Y', strtotime($r->DTEnvio));
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

    public function getRelatoriosApi(){
        $SQL = "SELECT em.Email,ev.Assunto,ev.Mensagem,ev.Anexos,rm.Email as Remetente,ev.created_at as DTEnvio FROM envios ev INNER JOIN emails em ON(em.id = ev.IDEmail) INNER JOIN remetentes rm ON(rm.id = ev.IDRemetente) WHERE ev.created_at >= DATE_SUB(CURDATE(), INTERVAL 90 DAY)";
        $registros = json_encode(DB::select($SQL));
        return $registros;
    }
}
