<?php
require 'db.php';


if (isset($_POST['search'])) {
    $search = '%' . $_POST['search'] . '%';

  
    $sql = "SELECT * FROM cursos WHERE nome LIKE :search";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':search', $search);
    $stmt->execute();
    $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

  
    if ($cursos) {
        foreach ($cursos as $curso) {
            echo "<tr>";
            echo "<td>{$curso['nome']}</td>";
            echo "<td>{$curso['descricao']}</td>";
            echo "<td>
                    <a href='editar_cursos.php?id={$curso['id_cursos']}' class='btn btn-warning btn-sm'>Editar</a>
                    <a href='excluir_cursos.php?id={$curso['id_cursos']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Nenhum curso encontrado.</td></tr>";
    }
}
?>
