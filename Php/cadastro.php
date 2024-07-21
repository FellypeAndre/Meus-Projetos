<?php
echo '<pre>';
print_r($_POST);
$senha = 0;
$csenha = 0;
if(!empty($_POST)){
    $senha = $_POST['senha'];
    $csenha = $_POST['csenha'];
}
echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex4</title>
</head>
<body>
    <form action="" method="post">
        Nome: <input type="text" name="nome" id="nome">
        <br>
        Usuario: <input type="text" name="usuario" id="usuario">
        <br>
        Senha: <input type="password" name="senha" id="senha">
        <br>
        Confirmação de Senha: <input type="password" name="csenha" id="csenha">
        <br>
        <input type="submit" value="Realizar Cadastro">
        <br>
        <br>
    <?php
        if($senha != $csenha){
        echo 'Falha ao realizar o cadastro!!';
    ?>
    <br>
    <?php
        echo 'Senhas não conferem!!';
    }else{
        echo 'Cadastro realizado com sucesso!!';
    }
    ?>
    </form>
</body>
</html>