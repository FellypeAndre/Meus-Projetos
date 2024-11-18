<?php
require 'db.php';

$id = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];

    // Atualizar os dados do aluno
    $sql = "UPDATE alunos SET nome = :nome, cpf = :cpf, email = :email WHERE id_aluno = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nome' => $nome, 'cpf' => $cpf, 'email' => $email, 'id' => $id]);

    // Redirecionar para a listagem com uma mensagem de sucesso
    header("Location: listar_alunos.php?msgSucesso=Aluno atualizado com sucesso");
    exit;
} else {
    // Carregar os dados do aluno para o formulário de edição
    $sql = "SELECT * FROM alunos WHERE id_aluno = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Editar Aluno</h1>
        <form method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $aluno['nome']; ?>">
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $aluno['cpf']; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $aluno['email']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="listar_alunos.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
