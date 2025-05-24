@extends('layout.site')

@section('titulo', 'Alunos')

@section('conteudo')
<div class="container">
    <h3 class="center">Editando Aluno</h3>
    <div class="row">
        <form action="{{ route('alunos.atualizar', $linha->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            @include('admin.alunos._form')
            <button class="btn deep-orange">Atualizar</button>
        </form>
    </div>
</div>
@endsection