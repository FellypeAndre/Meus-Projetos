<?php
echo '<pre>';
$res = 0;
$c = 0;
print_r($_POST);
if(!empty($_POST['c'])){
    $c = $_POST['c'];
    if(!empty($_POST['op'] == 'k')){
        $res = $c + 273;
    }
    if(!empty($_POST['op'] == 'f')){
        $res = (1.8 * $c) + 32;
    }
}
echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex2</title>
</head>
<body>
    <form action="" method="post">
        Insira uma temperatura em celsius:<input type="text" name="c" id="c">
        <br>
        <select name="op" id="op">
            <option value="">Selecione uma temperatura para conversão</option>
            <option value="f">Fahrenheit</option>
            <option value="k">Kelvin</option>
        </select>
        <br>
        <input type="submit" value="Converter">
        <br>
        <?php
            if(empty($_POST)){
        ?>
                <p>A temperatura convertida:</p>
       <?php
            }
            else{

        ?>    
                <p>A temperatura convertida: <?php echo $res?> </p>
        <?php
            }
        ?>
    </form>
</body>
</html>

