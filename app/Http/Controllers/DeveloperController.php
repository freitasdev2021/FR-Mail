<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function index(){
        return view('developer.index',[
            "APIToken" => self::getToken(),
            "IDInstituicao" => Auth::user()->IDInstituicao,
            "IDUser" => Auth::user()->id,
        ]);
    }

    public function getToken(){
        // Verifica se o usuário já tem um token chamado "Developer Panel Access"
        $existingToken = Auth::user()->tokens()->where('name', 'Developer Panel Access')->first();

        // Se o token já existir, use-o, caso contrário, crie um novo
        if (!$existingToken) {
            $token = Auth::user()->createToken('Developer Panel Access')->plainTextToken;
        } else {
            $token = $existingToken->token;
        }
        return $token;
    }
}
