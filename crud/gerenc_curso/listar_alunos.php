<?php
require 'db.php';
require_once 'cabecalho.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados dos Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Dados dos Alunos</h1>

        <!-- Campo de pesquisa -->
        <input type="text" id="search" class="form-control" placeholder="Pesquise pelo nome ou CPF">

        <!-- Tabela de alunos -->
        <table class="table tabela-alunos mt-3">
            <thead>
                <tr>
                    <th>Aluno</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="aluno-list">
                <?php
                $stmt = $pdo->query('SELECT * FROM alunos');
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>{$row['nome']}</td>";
                    echo "<td>{$row['cpf']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>
                            <a href='editar_aluno.php?id={$row['id_aluno']}' class='btn btn-warning btn-sm'>Editar</a>
                            <a href='excluir_aluno.php?id={$row['id_aluno']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
    $(document).ready(function(){
        $("#search").on("input", function() {
            var searchValue = $(this).val();

            $.ajax({
                url: "buscar_aluno.php",
                method: "POST",
                data: {search: searchValue},
                success: function(data) {
                    $("#aluno-list").html(data);
                }
            });
        });
    });
    </script>
</body>
</html>
