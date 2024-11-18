<?php
require 'db.php';

// Verifica se o ID da matrícula foi passado na URL
if (isset($_GET['id'])) {
    $id_matricula = $_GET['id'];

    // Verifica se o ID é um número válido
    if (is_numeric($id_matricula)) {
        try {
            // Prepara a consulta para excluir a matrícula
            $stmt = $pdo->prepare('DELETE FROM matriculas WHERE id = ?');
            $stmt->execute([$id_matricula]);

            // Redireciona para a lista de matrículas com uma mensagem de sucesso
            header('Location: matriculados.php?msg=Matrícula excluída com sucesso');
            exit();
        } catch (PDOException $e) {
            // Trata exceções e exibe uma mensagem de erro
            echo 'Erro ao excluir matrícula: ' . $e->getMessage();
        }
    } else {
        echo 'ID da matrícula inválido.';
    }
} else {
    echo 'Nenhum ID de matrícula fornecido.';
}
?>
