<?php 
require_once '../banco/conexaoBD.php';

try {
    // preparar / montar a SQL
    $sql = "SELECT * FROM pets ORDER BY nome";

    $stmt = $conexao->prepare($sql);

    // executar a SQL
    $stmt->execute();

    $listaPets = $stmt->fetchAll(PDO::FETCH_ASSOC);
  /*  
    echo '<pre>';
    print_r($listaPets);
    echo '</pre>';
    */

}
catch (PDOException $e) {
    echo "Falha ao conectar ao banco de dados";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pets Cadastrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h2>Lista de Pets</h2>
    <?php if (!empty($_GET['msgSucesso'])) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_GET['msgSucesso']; ?>
            </div>
        <?php } if (!empty($_GET['msgErro']))  { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['msgErro']; ?>
            </div>
        <?php } ?>
    <a href="cadastrar.php" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">Novo Pet</a>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">ID Espécie</th>
        <th scope="col">Raça</th>
        <th scope="col">Peso</th>
        <th scope="col">Idade</th>
        <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listaPets as $pet) { ?>
        <tr>
            <th scope="row"><?php echo $pet['id']; ?></th>
            <td><?php echo $pet['nome']; ?></td>
            <td><?php echo $pet['id_especie']; ?></td>
            <td><?php echo $pet['raca']; ?></td>
            <td><?php echo $pet['peso']; ?></td>
            <td><?php echo $pet['idade']; ?></td>
            <td>
            <a href="alterar.php?idEspecie=<?php echo $pet['id']; ?>" class="btn btn-warning" tabindex="-1" role="button" aria-disabled="true">Alterar</a>
            <a href="excluir.php?idEspecie=<?php echo $pet['id']; ?>" class="btn btn-danger" tabindex="-1" role="button" aria-disabled="true">Excluir</a>
            </td>
        </tr>
        <?php } ?>            
    </tbody>
    </table>
    </div>
</body>
</html>