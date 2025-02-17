<?php

// app/Http/Controllers/ProdutoController.php
namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
        ]);

        Produto::create($validated);

        return redirect()->route('produtos.index')->with('mensagem', 'Produto cadastrado com sucesso!');
    }
    public function index()
    {
        // Busca todos os produtos no banco de dados
        $produtos = Produto::all();

        // Retorna a view e passa a variável $produtos
        return view('index', compact('produtos'));
    }

    // Exemplo no seu controlador (EstoqueController.php)


}
