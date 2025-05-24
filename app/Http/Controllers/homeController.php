<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cursos as CursoModel;
use App\Models\Alunos as AlunoModel;

class HomeController extends Controller
{
    public function index()
    {
        $cursos = CursoModel::where('publicado', 'sim')->orderBy('id', 'desc')  ->take(6)->get();
        $alunos = AlunoModel::orderBy('id', 'desc')->take(3) ->get();
        return view('home', compact('cursos', 'alunos'));
    }
}