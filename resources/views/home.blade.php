@extends('layout.site')

@section('titulo', 'Página Inicial')

@section('conteudo')
<div class="container">
    <h1>Bem-vindo!</h1>

    {{-- Seção de Cursos --}}
    @if(isset($cursos) && !$cursos->isEmpty())
        <h2>Cursos Disponíveis</h2>
        <div class="row">
            @foreach($cursos as $curso)
            <div class="col s12 m6 l4">
                <div class="card hoverable">
                    @if(isset($curso->imagem) && !empty($curso->imagem))
                    <div class="card-image">
                        <img src="{{ asset($curso->imagem) }}" alt="{{ $curso->titulo }}" style="height: 200px; object-fit: cover;">
                        <span class="card-title" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.7);">{{ $curso->titulo }}</span>
                    </div>
                    @endif

                    <div class="card-content">
                        @if(!isset($curso->imagem) || empty($curso->imagem))
                        <span class="card-title">{{ $curso->titulo }}</span>
                        @endif

                        <p>{{ Str::limit($curso->descricao, 100) }}</p>
                        
                        @if(isset($curso->valor) && !empty(trim($curso->valor)))
                            <p style="font-size: 1.1em; font-weight: bold; margin-top: 10px; color: #26a69a;">
                                @php
                                    $valorNumerico = floatval(str_replace(',', '.', $curso->valor));
                                @endphp
                                @if($valorNumerico > 0)
                                    Valor: R$ {{ number_format($valorNumerico, 2, ',', '.') }}
                                @else
                                    Gratuito
                                @endif
                            </p>
                        @else
                             <p style="font-size: 1.1em; font-weight: bold; margin-top: 10px; color: #26a69a;">
                                Gratuito
                            </p>
                        @endif

                        @if(isset($curso->publicado) && $curso->publicado == 'sim')
                        @elseif(isset($curso->publicado) && $curso->publicado != 'sim')
                        @endif
                    </div>
                    <div class="card-action">
                        <a href="#" class="waves-effect waves-light btn-small teal lighten-1">Mais informações</a>
                        <a href="#" class="waves-effect waves-light btn-small">Inscrever-se</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <p>Nenhum curso disponível.</p>
    @endif

    <hr style="margin: 40px 0; border-top: 1px solid #eee;">

   {{-- Seção de Alunos --}}
@if(isset($alunos) && !$alunos->isEmpty())
    <h2>Nossos Alunos</h2>
    <div class="row">
        @foreach($alunos as $aluno)
        <div class="col s12 m6 l4">
            <div class="card hoverable">
                <div class="card-image">
                    <img src="{{ isset($aluno->imagem) && !empty($aluno->imagem) ? asset($aluno->imagem) : 'https://via.placeholder.com/300x200?text=Aluno' }}" alt="Foto de {{ $aluno->nome ?? 'Aluno' }}" style="height: 200px; object-fit: cover;">
                    <span class="card-title" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.7);">{{ $aluno->nome ?? 'Nome do Aluno' }}</span>
                </div>
                <div class="card-content">
                    <p>{{ Str::limit(isset($aluno->biografia) ? $aluno->biografia : 'Aluno(a) de nossa plataforma.', 100) }}</p>
                    @if(isset($aluno->email))
                        <p style="margin-top:10px;"><i class="material-icons left tiny">email</i>{{ $aluno->email }}</p>
                    @endif
                    {{-- @if(isset($aluno->telefone))
                        <p><i class="material-icons left tiny">phone</i>{{ $aluno->telefone }}</p>
                    @endif --}}
                </div>
                <div class="card-action">
                    <a href="#" class="waves-effect waves-light btn-small teal lighten-1">Ver perfil</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@else
    <p>Nenhum aluno matriculado.</p>
@endif

</div>
@endsection

@push('styles')
<style>
    .card .card-image img {
        max-height: 200px;
    }
    .card-title {
        font-size: 1.4rem;
    }
    .card .card-content p {
        margin-bottom: 8px;
    }
    .card .card-action a {
        margin-right: 8px !important;
    }
</style>
@endpush

@push('scripts')
<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //   // Inicializações do Materialize, se necessário
    // });
</script>
@endpush