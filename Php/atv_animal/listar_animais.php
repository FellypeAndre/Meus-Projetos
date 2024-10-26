<?php
include 'conexao.php';

$sql = "SELECT pets.id, pets.nome, pets.id_especie, pets.raca, pets.idade, pets.peso, especies.nome AS especie_nome 
        FROM pets 
        LEFT JOIN especies ON pets.id_especie = especies.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nome</th><th>ID Espécie</th><th>Nome da Espécie</th><th>Raça</th><th>Idade</th><th>Peso</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["id_especie"] . "</td>";
        echo "<td>" . $row["especie_nome"] . "</td>";
        echo "<td>" . $row["raca"] . "</td>";
        echo "<td>" . $row["idade"] . "</td>";
        echo "<td>" . $row["peso"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum pet encontrado.";
}
$conn->close();
?>

<br>
<a href="index.php">Voltar ao Menu Principal</a>
