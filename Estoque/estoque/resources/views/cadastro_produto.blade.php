<!-- resources/views/cadastro_produto.blade.php -->
<form method="POST" action="{{ url('/produtos') }}">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    @csrf <!-- Garante a proteção contra CSRF -->

    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h4>Cadastrar Novo Produto</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nome">Nome do Produto</label>
                    <input type="text" name="nome" id="nome" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" id="descricao" class="form-control" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="number" step="0.01" name="preco" id="preco" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" name="quantidade" id="quantidade" class="form-control" required>
                </div>

                <div class="form-group text-center">
                    <a href="{{ route('index') }}" class="btn btn-danger mr-2">Voltar</a>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
</form>
