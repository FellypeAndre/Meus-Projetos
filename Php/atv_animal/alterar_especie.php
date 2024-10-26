<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];

    $sql = "UPDATE especies SET nome='$nome', descricao='$descricao' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Espécie atualizada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<form method="post" action="">
    ID: <input type="text" name="id"><br>
    Nome: <input type="text" name="nome"><br>
    Descrição: <input type="text" name="descricao"><br>
    <input type="submit" value="Atualizar"><br>
    <a href="index.php">Voltar ao Menu Principal</a>
</form>
