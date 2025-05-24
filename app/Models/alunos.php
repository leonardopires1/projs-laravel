<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;


class alunos extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'celular',
        'imagem',
    ];
}