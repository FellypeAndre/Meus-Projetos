<?php
require 'db.php';
require_once 'cabecalho.php';

// Verifica se o ID do curso foi passado pela URL
$id_cursos = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];

    // Atualizar os dados do curso
    $sql = "UPDATE cursos SET nome = :nome, descricao = :descricao WHERE id_cursos = :id_cursos";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nome' => $nome, 'descricao' => $descricao, 'id_cursos' => $id_cursos]);

    // Redirecionar para a listagem com uma mensagem de sucesso
    header("Location: listar_cursos.php?msgSucesso=Curso atualizado com sucesso");
    exit;
} else {
    // Carregar os dados do curso para o formulário de edição
    $sql = "SELECT * FROM cursos WHERE id_cursos = :id_cursos";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id_cursos' => $id_cursos]);
    $curso = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o curso foi encontrado
    if (!$curso) {
        echo "<p>Curso não encontrado.</p>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Editar Curso</h1>
        <form method="post">
            <div class="mb-3">
                <label for="nome_curso" class="form-label">Nome do Curso</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($curso['nome']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" required><?php echo htmlspecialchars($curso['descricao']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="listar_cursos.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
