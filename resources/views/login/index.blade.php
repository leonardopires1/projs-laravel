@extends('layout.site')
@section('titulo','Login')

@section('conteudo')
<div class="container">
    <h3 class="center">Entrar</h3>
    <div class="row">
        <form class= "" action="{{route('login.entrar')}}" method="post">

            {{ csrf_field() }}
            <div class="input-field">
                <input type="text"name="email"><label>E-mail</label>
            </div>
            <div class="input-field">
                <input type="password"name="senha"><label>Senha</label>
            </div>
            <button class="btn blue darken-4">Entrar</button>
                </form>
    </div>
</div>
@endsection