<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alunos;

class AlunosController extends Controller
{
    public function index()
    {
        $rows = Alunos::all();
        return view('admin.alunos.index', compact('rows'));
    }

    public function create()
    {
        return view('admin.alunos.create');
    }

    public function store(Request $req)
    {
        $dados = $req->all();
        if ($req->hasFile('arquivo')) {
            $imagem = $req->file('arquivo');
            $num = rand(1111, 9999);
            $dir = "img/alunos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_" . $num . "." . $ex;
            $imagem->move($dir, $nomeImagem);
            $dados['imagem'] = $dir . "/" . $nomeImagem;
        }
        alunos::create($dados);
        return redirect()->route('alunos');
    }

    public function edit($id)
    {
        $linha = Alunos::find($id);
        return view('admin.alunos.editar', compact('linha'));
    }

    public function update(Request $req, $id)
    {
        $dados = $req->all();
        if ($req->hasFile('arquivo')) {
            $imagem = $req->file('arquivo');
            $num = rand(1111, 9999);
            $dir = "img/alunos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_" . $num . "." . $ex;
            $imagem->move($dir, $nomeImagem);
            $dados['imagem'] = $dir . "/" . $nomeImagem;
        }
        alunos::find($id)->update($dados);
        return redirect()->route('alunos');
    }

    public function destroy($id)
    {
        alunos::find($id)->delete();
        return redirect()->route('alunos');
    }
}
