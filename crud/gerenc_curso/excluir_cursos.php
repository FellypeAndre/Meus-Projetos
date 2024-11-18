<?php
require 'db.php';
require_once 'cabecalho.php';

$id_cursos = $_GET['id'] ?? null;

if ($id_cursos) {
    try {
        // Preparar a instrução SQL para excluir o curso
        $sql = "DELETE FROM cursos WHERE id_cursos = :id_cursos";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_cursos', $id_cursos, PDO::PARAM_INT);
        $stmt->execute();

        // Redirecionar para a listagem com uma mensagem de sucesso
        header("Location: listar_cursos.php?msgSucesso=Curso excluído com sucesso!");
        exit;
    } catch (PDOException $e) {
        echo "Erro ao excluir curso: " . $e->getMessage();
    }
} else {
    echo "ID do curso não fornecido.";
}
?>
