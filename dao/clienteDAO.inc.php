<?php
require_once 'conexao.inc.php';
require_once '../classes/cliente.inc.php';
require_once '../utils/dataUtil.inc.php';

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

    function incluirCliente(Cliente $cliente){
        $sql = ($this)->con->prepare("INSERT INTO `clientes` (`cod_cliente`, `nome`, `endereco`, `telefone`, `cpf`, `dt_nascimento`, `email`, `senha`) 
        VALUES (:cod, :nome, :endereco, :tel, :cpf, :dt, :email, :senha);");
        $sql->bindValue(':cod', $cliente->get_cod_cliente());
        $sql->bindValue(':nome', $cliente->get_nome());
        $sql->bindValue(':endereco', $cliente->get_endereco());
        $sql->bindValue(':tel', $cliente->get_telefone());
        $sql->bindValue(':cpf', $cliente->get_cpf());
        $sql->bindValue(':dt', conversorData($cliente->get_dt_nascimento()));
        $sql->bindValue(':email', $cliente->get_email());
        $sql->bindValue(':senha', $cliente->get_senha());
        $sql->execute();
    }
}
