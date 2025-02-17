<!-- resources/views/edit_produto.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Produto</h2>

        @if(session('mensagem'))
            <div class="alert alert-success">{{ session('mensagem') }}</div>
        @endif

        <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input type="text" name="nome" class="form-control" value="{{ old('nome', $produto->nome) }}" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" class="form-control">{{ old('descricao', $produto->descricao) }}</textarea>
            </div>

            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="number" step="0.01" name="preco" class="form-control" value="{{ old('preco', $produto->preco) }}" required>
            </div>

            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" name="quantidade" class="form-control" value="{{ old('quantidade', $produto->quantidade) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="{{ route('tabela') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
