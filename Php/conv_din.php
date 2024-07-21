<?php 
print_r($_POST);

$real = 0;
$dolar = 5.70;
$euro = 6.80;
$pesoC = 0.0059;
$pesoA = 0.004;
$result = 0 ;
if(!empty($_POST['real'])){
    $real = $_POST['real'];
    if(!empty($_POST['op'] == "dolar")){
        $result = $real * $dolar; 
    }
    if(!empty($_POST['op'] == "eur")){
        $result = $real * $euro; 
    }
    if(!empty($_POST['op'] == "pesoC")){
        $result = $real * $pesoC; 
    }
    if(!empty($_POST['op'] == "pesoA")){
        $result = $real * $pesoA; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Insira um valor em reais: <input type="text" name="real" id="real">
        <br>
        <select name="op" id="op">
            <option value="">Selecione a moeda</option>
            <option value="dolar">Dolar</option>
            <option value="eur">Euro</option>
            <option value="pesoC">Peso Chileno</option>
            <option value="pesoA">Peso Argentino</option>
        </select>
        <br>
        <input type="submit" value="Calcular">
        
        <?php
            if(empty($_POST)){
        ?>
                <p>O valor convertido:</p>
       <?php
            }
            else{

        ?>    
                <p>O valor convertido: <?php echo $result?> </p>
        <?php
            }
        ?>
    </form>
</body>
</html>
