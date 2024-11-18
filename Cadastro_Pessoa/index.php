<?php
require_once 'Modelo/Produtos.php';

$pessoa = new Pessoa("estoque", "localhost", "root", "");

// Processamento de formulário para cadastro ou atualização
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    
    if (!empty($nome) && !empty($telefone) && !empty($email)) {
        if (isset($_GET['id_up']) && !empty($_GET['id_up'])) {
            // Editar
            $id_up = (int) $_GET['id_up'];
            if (!$pessoa->atualizarDados($id_up, $nome, $telefone, $email)) {
                echo "<script>alert('Este email já está cadastrado.');</script>";
            } else {
                header("Location: index.php");
            }
        } else {
            // Cadastrar novo
            if (!$pessoa->cadastrarPessoa($nome, $telefone, $email)) {
                echo "<script>alert('Este email já está cadastrado.');</script>";
            } else {
                echo "<script>alert('Cadastrado com sucesso.');</script>";
            }
        }
    } else {
        echo "<script>alert('Preencha todos os campos');</script>";
    }
}

// Busca dados para atualização, se necessário
$res = null;
if (isset($_GET['id_up'])) {
    $id_update = (int) $_GET['id_up'];
    $res = $pessoa->buscarDadosPessoa($id_update);
}

// Excluir registro
if (isset($_GET['id'])) {
    $id_pessoa = (int) $_GET['id'];
    $pessoa->excluir($id_pessoa);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <section class="esquerda">
        <form class="cadastro" method="post">
            <h1>Cadastro de Pessoa</h1>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($res['nome'] ?? '') ?>">

            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone" value="<?= htmlspecialchars($res['telefone'] ?? '') ?>">

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars($res['email'] ?? '') ?>">

            <div class="cx_btn">
                <input type="submit" value="<?= isset($res) ? 'Atualizar' : 'Cadastrar' ?>">
            </div>
        </form>
    </section>

    <section class="direita">
        <h2>Lista de Pessoas</h2>
        <table>
            <tr id="titulo">
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>

            <?php
            $dados = $pessoa->buscarDados();
            if (count($dados) > 0) {
                foreach ($dados as $linha) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($linha['nome']) . "</td>";
                    echo "<td>" . htmlspecialchars($linha['telefone']) . "</td>";
                    echo "<td>" . htmlspecialchars($linha['email']) . "</td>";
                    echo "<td>";
                    echo "<a href='index.php?id={$linha['id']}'>Excluir</a> ";
                    echo "<a href='index.php?id_up={$linha['id']}'>Editar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4' class='avisos'>Não há dados cadastrados</td></tr>";
            }
            ?>
        </table>
    </section>

</body>
</html>
