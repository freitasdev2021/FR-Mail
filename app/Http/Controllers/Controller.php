<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function limpaCaracteres($num){
        return preg_replace('/[^0-9]/', '', $num);
    }
}
