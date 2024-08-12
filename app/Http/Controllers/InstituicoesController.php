<?php

namespace App\Http\Controllers;
use App\Models\Instituicao;
use Illuminate\Http\Request;

class InstituicoesController extends Controller
{
    public static function create($data){
        $Instituicao = Instituicao::create($data);
        return $Instituicao->id;
    }
}
