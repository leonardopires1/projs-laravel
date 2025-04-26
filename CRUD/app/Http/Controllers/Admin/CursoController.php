<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $rows = Curso::all();
        return view('admin.cursos.index', compact('rows'));
    }

    public function editar($id)
    {
        $row = Curso::findOrFail($id);
        return view('admin.cursos.editar', compact('row'));
    }
}
