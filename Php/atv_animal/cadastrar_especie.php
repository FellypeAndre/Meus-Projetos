<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];

    $sql = "INSERT INTO especies (nome, descricao) VALUES ('$nome', '$descricao')";

    if ($conn->query($sql) === TRUE) {
        echo "Nova espécie cadastrada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<form method="post" action="">
    Nome: <input type="text" name="nome"><br>
    Descrição: <input type="text" name="descricao"><br>
    <input type="submit" value="Cadastrar"><br>
    <a href="index.php">Voltar ao Menu Principal</a>
</form>
