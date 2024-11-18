<?php
require 'db.php';
require_once 'cabecalho.php';

// Consulta que une as tabelas alunos, cursos e matriculas
$sql = "SELECT matriculas.id AS id_matricula, alunos.nome AS aluno_nome, alunos.cpf AS aluno_cpf, alunos.email AS aluno_email, cursos.nome AS curso_nome
        FROM matriculas
        INNER JOIN alunos ON matriculas.aluno_id = alunos.id_aluno
        INNER JOIN cursos ON matriculas.curso_id = cursos.id_cursos
        ORDER BY alunos.nome";


$stmt = $pdo->query($sql);
$matriculas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos Matriculados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Alunos Matriculados</h1>

        <!-- Tabela de Matrículas -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome do Aluno</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th>Curso</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($matriculas) > 0): ?>
                    <?php foreach ($matriculas as $matricula): ?>
                        <tr>
                            <td><?php echo $matricula['aluno_nome']; ?></td>
                            <td><?php echo $matricula['aluno_cpf']; ?></td>
                            <td><?php echo $matricula['aluno_email']; ?></td>
                            <td><?php echo $matricula['curso_nome']; ?></td>
                            <td>
                                <a href="editar_matricula.php?id=<?php echo $matricula['id_matricula']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="excluir_matricula.php?id=<?php echo $matricula['id_matricula']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Nenhum aluno matriculado encontrado</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
