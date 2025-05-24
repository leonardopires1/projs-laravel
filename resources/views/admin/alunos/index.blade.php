@extends('layout.site')

@section('titulo', 'Alunos')

@section('conteudo')

<div class='container'>
    <h3 class='center'>Lista de Alunos</h3>
    <div class='row'>
        <table>
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Celular</td>
                    <td>Imagem</td>
                    <td>Ação</td>
                </tr>
            </thead>
            <tbody>
                @foreach($rows as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->nome }}</td>
                    <td>{{ $row->celular }}</td>
                    <td><img src="{{ asset($row->imagem) }}" alt="{{ $row->nome }}" width="50"></td>
                    <td>
                        <a class='btn deep-orange' href="{{ route('alunos.editar', $row->id) }}">Alterar</a>
                        <a class='btn red' href="{{ route('alunos.excluir', $row->id) }}">Excluir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class='row'>
        <a class='btn blue' href="{{ route('alunos.adicionar') }}">Adicionar</a>
    </div>
</div>

@endsection