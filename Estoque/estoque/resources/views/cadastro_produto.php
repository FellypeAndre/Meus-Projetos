<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Cadastro de Produto</h2>

        <?php if (isset($mensagem)) { ?>
            <div class="alert alert-info"><?php echo $mensagem; ?></div>
        <?php } ?>

        <form method="POST" action="cadastro_produto.php">
            <div class="form-group">
                <label>Nome do Produto</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Descrição</label>
                <textarea name="descricao" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Preço</label>
                <input type="number" step="0.01" name="preco" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Quantidade</label>
                <input type="number" name="quantidade" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>
</html>