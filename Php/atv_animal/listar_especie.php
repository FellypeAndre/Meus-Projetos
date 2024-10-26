<?php
include 'conexao.php';

$sql = "SELECT id, nome, descricao FROM especies";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nome</th><th>Descrição</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["descricao"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhuma espécie encontrada.";
}
$conn->close();
?>

<br>
<a href="index.php">Voltar ao Menu Principal</a>
