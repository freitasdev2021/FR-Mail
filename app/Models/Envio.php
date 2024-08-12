<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;

    protected $table = 'envios';

    protected $fillable = [
        'IDEmail',
        'IDUser',
        'IDInstituicao',
        'IDMensagem',
        'Hora',
        'Mensagem',
        'Anexos',
        'created_at',
        'updated_at'
    ];
}
