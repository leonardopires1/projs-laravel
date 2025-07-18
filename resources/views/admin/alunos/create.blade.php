@extends('layout.site')

@section('titulo', 'Alunos')

@section('conteudo')
<div class="container">
    <h3 class="center">Adicionar Aluno</h3>
    <div class="row">
        <form action="{{ route('alunos.salvar') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('admin.alunos._form')
            <button class="btn deep-orange">Salvar</button>
        </form>
    </div>
</div>
@endsection