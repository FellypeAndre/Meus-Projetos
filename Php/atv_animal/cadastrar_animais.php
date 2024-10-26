<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $id_especie = $_POST["id_especie"];
    $raca = $_POST["raca"];
    $idade = $_POST["idade"];
    $peso = $_POST["peso"];

    $sql = "INSERT INTO pets (nome, id_especie, raca, idade, peso) VALUES ('$nome', $id_especie, '$raca', $idade, $peso)";

    if ($conn->query($sql) === TRUE) {
        echo "Novo pet cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<form method="post" action="">
    Nome: <input type="text" name="nome"><br>
    Espécie (ID): <input type="text" name="id_especie"><br>
    Raça: <input type="text" name="raca"><br>
    Idade: <input type="text" name="idade"><br>
    Peso: <input type="text" name="peso"><br>
    <input type="submit" value="Cadastrar">
    <br>
    
<a href="index.php">Voltar ao Menu Principal</a>
</form>
