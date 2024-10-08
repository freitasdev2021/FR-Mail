<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    use HasFactory;

    protected $table = 'listas';

    protected $fillable = [
        'IDInstituicao',
        'Nome',
        'DSLista',
        'created_at',
        'updated_at'
    ];
}
