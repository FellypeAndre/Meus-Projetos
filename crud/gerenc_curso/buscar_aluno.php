<?php
require 'db.php';

// Recebe a busca do AJAX
$search = $_POST['search'] ?? '';

$sql = "SELECT * FROM alunos WHERE nome LIKE :search OR cpf LIKE :search";
$stmt = $pdo->prepare($sql);
$stmt->execute(['search' => '%' . $search . '%']);

// Gera as linhas da tabela para exibir os resultados da pesquisa
$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($alunos) {
    foreach ($alunos as $aluno) {
        echo "<tr>";
        echo "<td>{$aluno['nome']}</td>";
        echo "<td>{$aluno['cpf']}</td>";
        echo "<td>{$aluno['email']}</td>";
        echo "<td>
                <a href='editar_aluno.php?id={$aluno['id_aluno']}' class='btn btn-warning btn-sm'>Editar</a>
                <a href='excluir_aluno.php?id={$aluno['id_aluno']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>Nenhum aluno encontrado</td></tr>";
}
?>
