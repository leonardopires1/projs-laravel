<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cursos extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descricao',
        'imagem',
        'valor',
        'publicado'
    ];
}
