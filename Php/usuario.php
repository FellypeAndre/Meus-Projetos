<?php
echo '<pre>';
$usuario = 0;
$senha = 0;
// $user = ['wesley', 'kanashiro', 'wkanashiro', 'wesley.kanashiro'];
// $sen = ['987654', '12345678', 'qwerty123', 'asdfg9876'];
if(!empty($_POST)){
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
}
print_r($_POST);
echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex5</title>
</head>
<body>
    <form action="" method="post">
        Usuário: <input type="text" name="usuario" id="usuario"required>
        <br>
        Senha: <input type="password" name="senha" id="senha"required>
        <br>
        <input type="submit" value="Realizar Login">
        <br>
        <?php
        if(!empty($_POST)){
            if($usuario == 'wesley' && $senha == '987654'){
                echo 'Autenticação realizada com exito!';
            }elseif($usuario == 'kanashiro' && $senha == '12345678'){
                echo 'Autenticação realizada com exito!';
            }elseif($usuario == 'wkanashiro' && $senha == 'qwerty123'){
                echo 'Autenticação realizada com exito!';
            }elseif($usuario == 'wesley.kanashiro' && $senha == 'asdfg9876'){
                echo 'Autenticação realizada com exito!';
            }else{
                echo 'Falha ao realizar autenticação';
            }
            }
        ?>
    </form>
</body>
</html>