<?php

try {
    $pdo = new PDO ("mysql:dbname=estoque;host:localhost","root","");
    
} catch ( PDOException $e) {
    echo "Erro no Banco de Dados: ". $e->getMessage();
     
}
catch(Exception $e){
    echo "Erro Generico: ". $e->getMessage();

}



// $pdo -> query("INSERT INTO pessoa (nome,telefone,email) VALUES ('maria','92929392','maria@gmail.com'), 
//                                                                ('Pedro','123456789','pedro@gmail.com')");

// $result = $pdo -> query("DELETE FROM pessoa WHERE id=3");

// $result = $pdo -> query("UPDATE pessoa SET email = 'fellype@gmail.com' WHERE id= '1'     ");
// $result = $pdo -> query("UPDATE pessoa SET nome = 'Fellype' WHERE id=1 ");

$cmd = $pdo->query("SELECT * FROM pessoa");
// $cmd -> bindValue(":id",4);
$cmd -> execute();
$result = $cmd -> fetch(PDO::FETCH_ASSOC);

foreach ($result as $key => $value) {
    echo $key.": ". $value."<br>";
}

?>


