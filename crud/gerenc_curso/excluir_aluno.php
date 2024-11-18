<?php
require 'db.php';

$id = $_GET['id'] ?? null;

if ($id) {

    $sql = "DELETE FROM alunos WHERE id_aluno = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);

    // mensagem de sucesso
    header("Location: listar_alunos.php?msgSucesso=Aluno excluído com sucesso");
    exit;
} else {
    // mensagem de erro
    header("Location: listar_alunos.php?msgErro=Erro ao excluir o aluno");
    exit;
}
?>
