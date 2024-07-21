<?php 
$url = 'https://raw.githubusercontent.com/wkanashiro/php2024/main/passagens.json';
$conteudo = file_get_contents($url);
$item = json_decode($conteudo, true);
$sigla = '';

if (!empty($_POST['sigla'])) {
    $sigla = $_POST['sigla'];
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
    <title>Ex7</title>
</head>
<body>
    <form action="" method="post">
        Insira a sigla de um aeroporto: <input type="text" name="sigla" id="sigla" value="">
        <br>
        <input type="submit" value="Pesquisar">
        <br>
        <?php
        if (!empty($_POST['sigla'])) {
                $sigla = $_POST['sigla'];
                $produtoEncontrado = false;

                foreach ($item as $busca){

                    if ($sigla === $busca['origemDestino']){
                        echo "Passagens: " . $busca['origemDestino'] . " Encontrado <br>";
                        echo "Preço: " . $busca['valor'] . "R$";
                    }
                }
                if(!$produtoEncontrado){
                    echo "Nenhuma passagem foi encontrada";
                }
        }
        ?>
    </form>
</body>