<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $sql = "DELETE FROM pets WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Pet apagado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<form method="post" action="">
    ID: <input type="text" name="id"><br>
    <input type="submit" value="Apagar"><br>
    <a href="index.php">Voltar ao Menu Principal</a>
</form>
