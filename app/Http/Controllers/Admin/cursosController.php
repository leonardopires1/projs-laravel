<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cursos;

class cursosController extends Controller
{
    public function index()
    {
        $rows = cursos::all();
        return view('admin.cursos.index', compact('rows'));
    }

    public function create()
    {
        return view('admin.cursos.create');
    }

    public function store(Request $request)
    {
        $cursos = new cursos();
        $cursos->titulo = $request->titulo;
        $cursos->descricao = $request->descricao;
        $cursos->imagem = $request->imagem;
        $cursos->valor = $request->valor;
        $cursos->publicado = $request->publicado;
        $cursos->save();

        return redirect()->route('admin.cursos.index');
    }

    public function adicionar()
    {
        return view('admin.cursos.adicionar');
    }


    public function editar($id)
    {
        // repare que ele recebe o id da ROTA
        $linha = cursos::find($id);
        // carrega o registro (realiza um select e um fetch internamente)
        return view('admin.cursos.editar', compact('linha'));
        // manda o registro encontrado para ser editado na visão
    }
    public function excluir($id)
    {
        // repare que ele recebe o id da ROTA
        cursos::find($id)->delete();
        // apos selecionar o registro, é chamado o
        // método DELETE do OBJETO registro
        // é mapeado internamente como um 'delete from'
        // interno que rodara no BD
        return redirect()->route('admin.cursos');
        // abre a visão da lista de cursos
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();
        if (isset($dados['publicado'])) {
            $dados['publicado'] = 'sim';
        } else {
            $dados['publicado'] = 'nao';
        }
        if ($req->hasFile('arquivo')) {
            $imagem = $req->file('arquivo');
            $num = rand(1111, 9999);
            $dir = "img/cursos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_" . $num . "." . $ex;
            $imagem->move($dir, $nomeImagem);
            $dados['imagem'] = $dir . "/" . $nomeImagem;
        }
        cursos::create($dados);
        return redirect()->route('admin.cursos');
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();
        if (isset($dados['publicado'])) {
            $dados['publicado'] = 'sim';
        } else {
            $dados['publicado'] = 'nao';
        }
        if ($req->hasFile('arquivo')) {
            $imagem = $req->file('arquivo');
            $num = rand(1111, 9999);
            $dir = "img/cursos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_" . $num . "." . $ex;
            $imagem->move($dir, $nomeImagem);
            $dados['imagem'] = $dir . "/" . $nomeImagem;
        }
        cursos::find($id)->update($dados);
        return redirect()->route('admin.cursos');
    }
}
