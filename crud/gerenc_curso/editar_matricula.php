<?php
require 'db.php';
require_once 'cabecalho.php';

// Verifica se o ID da matrícula foi passado na URL
if (isset($_GET['id'])) {
    $id_matricula = $_GET['id'];

    // Busca a matrícula atual
    $stmt = $pdo->prepare('SELECT * FROM matriculas WHERE id = ?');
    $stmt->execute([$id_matricula]);
    $matricula = $stmt->fetch(PDO::FETCH_ASSOC);

    // Obtém todos os cursos disponíveis
    $cursos = $pdo->query('SELECT * FROM cursos ORDER BY nome')->fetchAll(PDO::FETCH_ASSOC);

    // Atualiza a matrícula se o formulário for enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $novo_curso_id = $_POST['curso_id'];

        // Atualiza a matrícula com o novo curso
        $stmt = $pdo->prepare('UPDATE matriculas SET curso_id = ? WHERE id = ?');
        $stmt->execute([$novo_curso_id, $id_matricula]);

        header('Location: matriculados.php?msg=Matrícula atualizada com sucesso');
        exit();
    }
} else {
    echo 'Nenhum ID de matrícula fornecido.';
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Matrícula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Editar Matrícula</h1>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="curso_id" class="form-label">Curso</label>
                <select name="curso_id" class="form-select" id="curso_id" required>
                    <?php foreach ($cursos as $curso): ?>
                        <option value="<?php echo $curso['id_cursos']; ?>" <?php echo ($curso['id_cursos'] == $matricula['curso_id']) ? 'selected' : ''; ?>>
                            <?php echo $curso['nome']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar Matrícula</button>
        </form>
    </div>
</body>
</html>
