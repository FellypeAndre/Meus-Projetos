<?php 
$url = 'https://raw.githubusercontent.com/wkanashiro/php2024/main/listaProdutos.json';
$conteudo = file_get_contents($url);
$item = json_decode($conteudo, true);
$produto = '';

if (!empty($_POST['prod'])) {
    $produto = $_POST['prod'];
}

// echo '<pre>';
// echo print_r($item);
// echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex6</title>
</head>
<body>
    <form action="" method="post">
        Nome do produto: <input type="text" name="prod" id="prod" value="<?php echo htmlspecialchars($produto); ?>">
        <br>
        <input type="submit" value="Pesquisar">
        <br>
        <?php
        if (!empty($_POST['prod'])) {
                $produto = $_POST['prod'];

                foreach ($item as $busca){

                    if ($produto === $busca['nome']){
                        echo "Produto: " . $busca['nome'] . " Encontrado ";
        ?>
        <br>
        <?php
                        echo "Preço: " . $busca['valor'] . "R$";
                    }
                }
  
        }
        ?>
    </form>
</body>
</html>