<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function entrar(Request $request)
    {
        $dados = $request->all();

        if (Auth::attempt([
            'email' => $dados['email'],
            'password' => $dados['senha']
        ])) {
            return redirect()->route('home')
                ->with('success', 'Login realizado com sucesso.');
        }

        return redirect()->route('login')
            ->with('error', 'Usuário ou senha inválidos.')
            ->withInput($request->only('email'));
    }

    public function sair()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
