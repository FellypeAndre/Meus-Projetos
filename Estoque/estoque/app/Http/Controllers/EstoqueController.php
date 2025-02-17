<?php

namespace App\Http\Controllers;

use App\Models\Produto; // Importação correta

use Illuminate\Http\Request;

class EstoqueController extends Controller
{

    // Exemplo no seu controlador (EstoqueController.php)


    public function index()
    {
        return view('index');
    }
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function tabela()
    {
        $produtos = Produto::all();
        return view('tables', compact('produtos')); // Mudei 'tabela' para 'tables'
    }

    public function cadastro()
    {
        return view('cadastro_produto');
    }

    public function destroy($id)
    {
        // Encontra o produto pelo ID
        $produto = Produto::findOrFail($id);

        // Deleta o produto
        $produto->delete();

        // Retorna à tabela de produtos com uma mensagem
        return redirect()->route('tabela')->with('mensagem', 'Produto excluído com sucesso!');
    }

    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('edit_produto', compact('produto'));
    }

    // Método para atualizar o produto no banco de dados
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $validated = $request->validate([
            'nome' => 'required|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
        ]);

        // Encontra o produto
        $produto = Produto::findOrFail($id);

        // Atualiza as informações do produto
        $produto->update($validated);

        // Redireciona para a tabela de produtos com uma mensagem de sucesso
        return redirect()->route('tabela')->with('mensagem', 'Produto atualizado com sucesso!');
    }
}
