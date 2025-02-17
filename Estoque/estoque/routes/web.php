<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\{
    EstoqueController,
    UserController,
    AuthController,
    ProdutoController
};
use App\Models\Produto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui estão as rotas do sistema.
|
*/

//  Páginas principais
Route::get('/', function () {
    return view('index');
})->name('index')->middleware('auth'); // Apenas usuários autenticados

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

// Rotas de produtos
Route::get('/tabela', [EstoqueController::class, 'tabela'])->name('tabela');
Route::get('/cadastro', [EstoqueController::class, 'cadastro'])->name('cadastro');

// Cadastro de produtos
Route::post('/produtos', function (Request $request) {
    $validated = $request->validate([
        'nome' => 'required|max:255',
        'descricao' => 'nullable|string',
        'preco' => 'required|numeric',
        'quantidade' => 'required|integer',
    ]);

    Produto::create($validated);

    return redirect()->route('tabela')->with('mensagem', 'Produto cadastrado com sucesso!');
})->name('produtos.store');

// Rotas para edição e exclusão de produtos
Route::get('/produtos/{id}/edit', [EstoqueController::class, 'edit'])->name('produtos.edit');
Route::put('/produtos/{id}', [EstoqueController::class, 'update'])->name('produtos.update');
Route::delete('/produtos/{id}', [EstoqueController::class, 'destroy'])->name('produtos.destroy');

//  Sobre nós
Route::get('/sobre', [EstoqueController::class, 'sobre'])->name('sobre');

//  Autenticação de usuários
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//  Cadastro de usuários
Route::get('/register', [UserController::class, 'showForm'])->name('register');
Route::post('/register', [UserController::class, 'store']);
