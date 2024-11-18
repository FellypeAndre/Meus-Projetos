<?php
require 'db.php';
require_once 'cabecalho.php';

// Variável para controle do modal
$showModal = false;

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];

    // Insere os dados do curso no banco de dados
    $stmt = $pdo->prepare('INSERT INTO cursos (nome, descricao) VALUES (?, ?)');
    $stmt->execute([$nome, $descricao]);

    // Define a variável para exibir o modal
    $showModal = true;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Cadastrar Curso</h1>

        <form action="" method="post" class="bg-light p-5 rounded shadow">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome do curso" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control" id="descricao" rows="3" placeholder="Digite a descrição do curso" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Cadastrar Curso</button>
        </form>
    </div>

    <!-- Modal de Sucesso -->
    <?php if ($showModal): ?>
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Cadastro realizado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Curso cadastrado com sucesso!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Exibe o modal quando a página carrega
        document.addEventListener('DOMContentLoaded', function () {
            var myModal = new bootstrap.Modal(document.getElementById('successModal'));
            myModal.show();
        });
    </script>
    <?php endif; ?>
</body>
</html>
