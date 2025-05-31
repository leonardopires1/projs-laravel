<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->group(function () {
        Route::get('/home', [
            'as' => 'home',
            'uses' => 'App\Http\Controllers\homeController@index'
        ]);

        Route::get(
            '/admin/cursos',
            [
                'as'  => 'admin.cursos',
                'uses' => 'App\Http\Controllers\Admin\cursosController@index'
            ]
        );

        Route::get(
            '/admin/cursos/adicionar',
            [
                'as'  => 'admin.cursos.adicionar',
                'uses' => 'App\Http\Controllers\Admin\cursosController@adicionar'
            ]
        );

        Route::post(
            '/admin/cursos/salvar',
            [
                'as'  => 'admin.cursos.salvar',
                'uses' => 'App\Http\Controllers\Admin\cursosController@salvar'
            ]
        );

        Route::get(
            '/admin/cursos/editar/{id}',
            [
                'as'  => 'admin.cursos.editar',
                'uses' => 'App\Http\Controllers\Admin\cursosController@editar'
            ]
        );

        Route::put(
            '/admin/cursos/atualizar/{id}',
            [
                'as'  => 'admin.cursos.atualizar',
                'uses' => 'App\Http\Controllers\Admin\cursosController@atualizar'
            ]
        );

        Route::get(
            '/admin/cursos/excluir/{id}',
            [
                'as'  => 'admin.cursos.excluir',
                'uses' => 'App\Http\Controllers\Admin\cursosController@excluir'
            ]
        );

        Route::put('/admin/cursos/atualizar/{id}', [
            'as' => 'admin.cursos.atualizar',
            'uses' => 'App\Http\Controllers\Admin\cursosController@atualizar'
        ]);
        Route::get(
            '/alunos',
            [
                'as'  => 'alunos',
                'uses' => 'App\Http\Controllers\Admin\AlunosController@index'
            ]
        );
        Route::get(
            '/alunos/adicionar',
            [
                'as'  => 'alunos.adicionar',
                'uses' => 'App\Http\Controllers\Admin\AlunosController@create'
            ]
        );

        Route::post(
            '/alunos/salvar',
            [
                'as'  => 'alunos.salvar',
                'uses' => 'App\Http\Controllers\Admin\AlunosController@store'
            ]
        );

        Route::get(
            '/alunos/editar/{id}',
            [
                'as'  => 'alunos.editar',
                'uses' => 'App\Http\Controllers\Admin\AlunosController@edit'
            ]
        );

        Route::put(
            '/alunos/atualizar/{id}',
            [
                'as'  => 'alunos.atualizar',
                'uses' => 'App\Http\Controllers\Admin\AlunosController@update'
            ]
        );

        Route::get(
            '/alunos/excluir/{id}',
            [
                'as'  => 'alunos.excluir',
                'uses' => 'App\Http\Controllers\Admin\AlunosController@destroy'
            ]
        );
    });






//login
Route::get('/login', [
    'as' => 'login',
    'uses' => 'App\Http\Controllers\loginController@index'
]);

Route::post('/login', [
    'as' => 'login.entrar',
    'uses' => 'App\Http\Controllers\loginController@entrar'
]);

Route::get('/logout', [
    'as' => 'login.sair',
    'uses' => 'App\Http\Controllers\loginController@sair'
]);
