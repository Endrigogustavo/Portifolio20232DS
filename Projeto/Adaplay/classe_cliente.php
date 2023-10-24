<?php

Class Cliente{
    private $pdo;

    // CONEXAO COM O BANCO DE DADOS
    public function __construct($host, $port, $dbname, $user, $senha)
    {

        $host = "localhost"; // ou o endereço IP ou nome de domínio do servidor MySQL
         $port = 3306; // ou outra porta configurada para o MySQL
         $dbname = "ecom_store";
         $user = "root";
         $senha = "";

        try
        {
            $this->pdo = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname .';', $user, $senha);       
        }
        catch(PDOException $e)
        {
            echo "Erro com banco de dados: ".$e->getMessage();
        }
        catch(Exception $e)
        {
            echo "Erro generico: ".$e->getMessage();
        }
    }

    public function buscarMensagens()
    {   $res = array();
        $cmd = $this->pdo->query("SELECT * FROM message_clients ORDER BY id desc");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function cadastrarMensagem($nome, $email, $assunto, $telefone, $mensagem)
    {
        $cmd = $this->pdo->prepare("INSERT INTO message_clients (nome, email, assunto, telefone, mensagem) VALUES (:n, :e, :a, :t, :m)");
        $cmd->bindValue(":n", $nome);
        $cmd->bindValue(":e", $email);
        $cmd->bindValue(":a", $assunto);
        $cmd->bindValue(":t", $telefone);
        $cmd->bindValue(":m", $mensagem);
        $cmd->execute();
    }

    public function excluirMensagem($id)
    {
        $cmd = $this->pdo->prepare("DELETE FROM message_clients WHERE id = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();
    }

    // EDITAR (UPDATE)
    public function buscarDadosCliente($id) 
    {
        $res = array();
        $cmd = $this->pdo->prepare("SELECT * FROM message_clients WHERE id = :id");
        $cmd->bindValue(":id",$id);
        $cmd->execute();
        $res = $cmd-> fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function atualizarDados($id, $nome, $email, $assunto, $telefone, $mensagem)
    {
        $cmd = $this->pdo->prepare("UPDATE message_clients SET nome = :n, email= :e, assunto= :a, telefone = :t, mensagem= :m WHERE id = :id");
        $cmd->bindValue(":n", $nome);
        $cmd->bindValue(":e", $email);
        $cmd->bindValue(":a", $assunto);
        $cmd->bindValue(":t", $telefone);
        $cmd->bindValue(":m", $mensagem);
        $cmd->bindValue(":id",$id);
        $cmd->execute();
    }
}

?>