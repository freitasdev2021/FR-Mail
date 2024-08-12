<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    use HasFactory;

    protected $table = 'mensagens';

    protected $fillable = [
        'IDInstituicao',
        'Titulo',
        'Conteudos',
        'Anexos',
        'created_at',
        'updated_at'
    ];
}
