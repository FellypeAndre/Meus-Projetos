<?php
require 'db.php';
require_once 'cabecalho.php';

// Variável para controle do modal
$showModal = false;

// Obtém a lista de alunos e cursos
$alunos = [];
$cursos = [];

// Obtém todos os alunos
$alunosStmt = $pdo->query('SELECT * FROM alunos ORDER BY nome');
while ($row = $alunosStmt->fetch()) {
    $alunos[] = $row;
}

// Obtém todos os cursos
$cursosStmt = $pdo->query('SELECT * FROM cursos ORDER BY nome');
while ($row = $cursosStmt->fetch()) {
    $cursos[] = $row;
}

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $aluno_id = $_POST['id_aluno'];
    $curso_id = $_POST['id_cursos'];

    // Insere a matrícula do aluno no curso
    $stmtMatricula = $pdo->prepare('INSERT INTO matriculas (aluno_id, curso_id) VALUES (?, ?)');
    $stmtMatricula->execute([$aluno_id, $curso_id]);

    // Define a variável para exibir o modal
    $showModal = true;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matricular Aluno em Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Matricular Aluno em Curso</h1>

        <!-- Formulário de Matrícula -->
        <form action="" method="post" class="bg-light p-5 rounded shadow">
            <div class="mb-3">
                <label for="id_aluno" class="form-label">Aluno</label>
                <select name="id_aluno" class="form-select" id="id_aluno" required>
                    <option value="" disabled selected>Selecione o aluno</option>
                    <?php foreach ($alunos as $aluno): ?>
                        <option value="<?php echo $aluno['id_aluno']; ?>"><?php echo $aluno['cpf']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="id_cursos" class="form-label">Curso</label>
                <select name="id_cursos" class="form-select" id="id_cursos" required>
                    <option value="">Selecione o curso</option>
                    <?php foreach ($cursos as $curso): ?>
                        <option value="<?php echo $curso['id_cursos']; ?>"><?php echo $curso['nome']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Matricular Aluno</button>
        </form>
    </div>

    <!-- Modal de Sucesso -->
    <?php if ($showModal): ?>
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Matrícula realizada</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Aluno matriculado com sucesso!
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
