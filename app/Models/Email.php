<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $table = 'emails';

    protected $fillable = [
        'IDLista',
        'Nome',
        'IDInstituicao',
        'Email',
        'created_at',
        'updated_at'
    ];
}
