<?php
require_once 'conexao.inc.php';

class ClienteDAO
{
    private $con;

    function __construct()
    {
        $conexao = new Conexao();
        ($this)->con = $conexao->getConexao();
    }

    function autenticar($email, $senha)
    {
        $sql = ($this)->con->prepare("SELECT * FROM clientes WHERE email = :usr and senha = :pass");
        $login = strtolower($email);
        $senha = strtolower($senha);
        $sql->bindValue(':usr', $email);
        $sql->bindValue(':pass', $senha);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return $sql->fetch(PDO::FETCH_OBJ); //DEPOIS IMPLEMENTAR UMA CLASSE CLIENTE E SUBSTITUIR AQUI
        } else {
            return NULL;
        }
    }
}
