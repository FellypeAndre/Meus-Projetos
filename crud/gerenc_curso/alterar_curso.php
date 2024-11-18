<?php 
require_once 'cabecalho.php';
include 'db.php';

if (isset($_GET['idCurso'])) {
    $idCurso = $_GET['idCurso'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];

        try {
            $sql = "UPDATE cursos SET nome = :nome, descricao = :descricao WHERE id = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':id', $idCurso);
            $stmt->execute();

            header("Location: listar_cursos.php?msgSucesso=Curso atualizado com sucesso!");
        } catch (PDOException $e) {
            echo "Erro ao atualizar curso: " . $e->getMessage();
        }
    } else {
        $sql = "SELECT * FROM cursos WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $idCurso);
        $stmt->execute();
        $curso = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Curso</title>
</head>
<body>
    <div class="container">
        <h2>Alterar Curso</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $curso['nome']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $curso['descricao']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>
