<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $sql = "DELETE FROM especies WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Espécie apagada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<form method="post" action="">
    ID: <input type="text" name="id"><br>
    <input type="submit" value="Apagar">
    <br>
    <a href="index.php">Voltar ao Menu Principal</a>
</form>
