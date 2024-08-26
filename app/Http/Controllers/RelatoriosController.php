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
        $IDInstituicao = Auth::user()->IDInstituicao;
        $whereSearch = '';
        //
        $pesquisa = '';
        if(isset($_GET['pesquisa'])){
            $pesquisa = $_GET['pesquisa'];
        }
        if(!empty($pesquisa)){
            $whereSearch = ' AND ev.Assunto LIKE "%'.$pesquisa.'%" OR ev.Mensagem LIKE "%'.$pesquisa.'%" ';
        }
        //PAGINA ATUAL
        if(!isset($_GET['page'])){
            $page = 1;
        }else{
            $page = $_GET['page'];
        }
        //PERGUNTA O ESTADO DA PAGINA ATUAL
        if($page == 1){
            $limit = " LIMIT 10";
        }else{
            $limit = " LIMIT ".($page-1) * 10 .",10";
        }
        //
        $SQL = "SELECT 
            em.Email,em.Email as Destinatario,ev.Assunto,ev.Mensagem,ev.Anexos,rm.Email as Remetente,ev.created_at as DTEnvio 
        FROM envios ev 
        INNER JOIN emails em ON(em.id = ev.IDEmail) 
        INNER JOIN remetentes rm ON(rm.id = ev.IDRemetente) 
        WHERE ev.created_at >= DATE_SUB(CURDATE(), INTERVAL 90 DAY) $whereSearch $limit";
        $registros = DB::select($SQL);
        $qtSql = DB::select("SELECT id FROM envios ev WHERE IDInstituicao = $IDInstituicao $whereSearch ");
        $QuantidadeTotal = ceil(count($qtSql));
        $linksPaginaveis = ceil($QuantidadeTotal/10);
        $Rota = route('Envios/Relatorios/index');
        return view('Relatorios.index',[
            "submodulos"=> self::submodulos,
            "Listas" => Lista::select('id','Nome')->where('IDInstituicao',Auth::user()->IDInstituicao)->get(),
            "Remetentes" => Remetente::select('id','Email')->where('IDInstituicao',Auth::user()->IDInstituicao)->get(),
            "Registros"=>$registros,
            "Quantidade"=> $QuantidadeTotal,
            "linksPaginaveis" => $linksPaginaveis,
            "primeiraPagina"=> max($page-3,1),
            "ultimaPagina"=> min($QuantidadeTotal,$page+3),
            "page"=> $page,
            "Anterior"=> $Rota."?pesquisa=".$pesquisa."&page=".$linksPaginaveis-1,
            "Atual"=> $Rota,
            "Pesquisa"=> $pesquisa,
            "Proximo"=> $Rota."?pesquisa=".$pesquisa."&page=".$linksPaginaveis 
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
        
        
    }

    public function getRelatoriosApi(){
        $SQL = "SELECT em.Email,ev.Assunto,ev.Mensagem,ev.Anexos,rm.Email as Remetente,ev.created_at as DTEnvio FROM envios ev INNER JOIN emails em ON(em.id = ev.IDEmail) INNER JOIN remetentes rm ON(rm.id = ev.IDRemetente) WHERE ev.created_at >= DATE_SUB(CURDATE(), INTERVAL 90 DAY)";
        $registros = json_encode(DB::select($SQL));
        return $registros;
    }
}
