<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Exibe o formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Processa o login
    public function login(Request $request)
    {
        // Validação dos dados do formulário
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Se a validação falhar, retorna os erros para o formulário
        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput();
        }

        // Tenta realizar o login
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('index'); // Redireciona para a página principal após login
        } else {
            return redirect()->route('login')->withErrors(['message' => 'Credenciais inválidas.'])->withInput();
        }
    }

    // Deslogar o usuário
    public function logout()
    {
        Auth::logout(); // Loga o usuário
        return redirect()->route('login'); // Redireciona para a página de login após logout
    }
}
