<?php
echo '<pre>';
print_r($_POST);
$n1 = 0;
$n2 = 0;
$n3 = 0;
$m = '';
if(!empty($_POST)){
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $n3 = $_POST['n3'];
    $m = ($n1 + $n2 + $n3) / 3;
}
echo '</pre>'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex3</title>
</head>
<body>
    <form action="" method="post">
        1° Nota <input type="text" name="n1" id="n1" required>
        <br>
        2° Nota <input type="text" name="n2" id="n2" required>
        <br>
        3° Nota <input type="text" name="n3" id="n3" required>
        <br>
        <input type="submit" value="Calcular média">
        <br>
        <p>Sua média é: <?php echo $m ?></p>
    </form>
    <?php
    if($m < 6){
        echo 'Aluno Reprovado!!'
    ?>
    <?php 
    }else{
        echo 'Aluno Aprovado!!'
    ?>
    <?php
    }
    ?>
</body>
</html>
