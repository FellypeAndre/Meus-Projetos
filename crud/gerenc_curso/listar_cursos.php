<?php
require 'db.php';
require_once 'cabecalho.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Lista de Cursos</h1>

        <!-- Campo de busca -->
        <input type="text" id="search" class="form-control" placeholder="Pesquise pelo nome">

        <!-- Tabela para exibir os cursos -->
        <table class="table tabela-alunos mt-3">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="curso-list">
                <!-- Os dados da tabela serão carregados via AJAX -->
                <?php
                $stmt = $pdo->query('SELECT * FROM cursos');
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>{$row['nome']}</td>";
                    echo "<td>{$row['descricao']}</td>";
                    echo "<td>
                            <a href='editar_cursos.php?id={$row['id_cursos']}' class='btn btn-warning btn-sm'>Editar</a>
                            <a href='excluir_cursos.php?id={$row['id_cursos']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Script para a pesquisa em tempo real -->
    <script>
    $(document).ready(function() {
        // Captura o evento de digitação no campo de pesquisa
        $("#search").on("input", function() {
            var searchValue = $(this).val(); // Valor digitado

            $.ajax({
                url: "buscar_curso.php", // URL do arquivo PHP para processar a busca
                method: "POST",
                data: { search: searchValue }, // Envia o valor digitado via POST
                success: function(data) {
                    // Atualiza o conteúdo da tabela com os resultados retornados
                    $("#curso-list").html(data);
                }
            });
        });
    });
    </script>
</body>
</html>
