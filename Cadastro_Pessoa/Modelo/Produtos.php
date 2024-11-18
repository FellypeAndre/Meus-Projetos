<?php


class Pessoa
{

    private $pdo;

    public function __construct($dbname, $host, $user, $senha)
    {
        try {
            //code...
        } catch (PDOException $e) {
            echo "Erro com banco de Dados: " . $e->getMessage();
            exit();
        } catch (Exception $e) {
            echo "Erro generico: " . $e->getMessage();
            exit();
        }
        $this->pdo = new PDO("mysql:dbname=" . $dbname . "; host=" . $host, $user, $senha);
    }

    // função pora buscar os dados para tabela
    public function buscarDados()
    {
        $res = array();
        $cmd = $this->pdo->query("SELECT * FROM pessoa ORDER BY id DESC");

        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }


    // Função de cadastrar Pessoa
    public function cadastrarPessoa($nome, $telefone, $email)
    {
        $cmd = $this->pdo->prepare("SELECT id FROM pessoa WHERE email = :e ");
        $cmd->bindValue(":e", $email);
        $cmd->execute();

        if ($cmd->rowCount() > 0) {


            return false;
        } else {
            $cmd = $this->pdo->prepare("INSERT INTO pessoa (nome,telefone,email) VALUES (:n,:t,:e)");

            $cmd->bindValue(":n", $nome);
            $cmd->bindValue(":t", $telefone);
            $cmd->bindValue(":e", $email);

            $cmd->execute();
            return true;
        }
    }

    public function excluir($id)
    {

        $cmd = $this->pdo->prepare("DELETE FROM pessoa WHERE id = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();
    }

    // Buscar dados de uma pessoa
    public function buscarDadosPessoa($id)
    {
        $res = array();
        $cmd = $this->pdo->prepare("SELECT * FROM pessoa WHERE id = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_ASSOC);

        return $res;
    }

    public function atualizarDados($id, $nome, $telefone, $email)
    {
        // Verifica se o email já está cadastrado para outro ID
        $cmd = $this->pdo->prepare("SELECT id FROM pessoa WHERE email = :e AND id != :id");
        $cmd->bindValue(":e", $email);
        $cmd->bindValue(":id", $id);
        $cmd->execute();
    
        if ($cmd->rowCount() > 0) {
            // Email já está cadastrado para outro registro
            return false;
        } else {
            // Atualiza os dados caso o email não esteja duplicado
            $cmd = $this->pdo->prepare("UPDATE pessoa SET nome = :n, telefone = :t, email = :e WHERE id = :id");
            $cmd->bindValue(":id", $id);
            $cmd->bindValue(":n", $nome);
            $cmd->bindValue(":t", $telefone);
            $cmd->bindValue(":e", $email);
            $cmd->execute();
            return true;
        }
    }

    public function cadastrandoImagem(){
        
    }
    
}


