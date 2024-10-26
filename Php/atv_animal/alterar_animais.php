<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $id_especie = $_POST["id_especie"];
    $raca = $_POST["raca"];
    $idade = $_POST["idade"];
    $peso = $_POST["peso"];

    $sql = "UPDATE pets SET nome='$nome', id_especie=$id_especie, raca='$raca', idade=$idade, peso=$peso WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Pet atualizado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<form method="post" action="">
    ID: <input type="text" name="id"><br>
    Nome: <input type="text" name="nome"><br>
    Espécie (ID): <input type="text" name="id_especie"><br>
    Raça: <input type="text" name="raca"><br>
    Idade: <input type="text" name="idade"><br>
    Peso: <input type="text" name="peso"><br>
    <input type="submit" value="Atualizar"><br>
    <a href="index.php">Voltar ao Menu Principal</a>
</form>
