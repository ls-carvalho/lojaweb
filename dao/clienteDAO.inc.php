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
        $sql = ($this)->con->prepare("SELECT * FROM clientes WHERE email = :usr and senha = :pass and data_exclusao = null"); //adicionado condicional para cliente excluido logicamente
        $login = strtolower($email);
        $senha = strtolower($senha);
        $sql->bindValue(':usr', $login);
        $sql->bindValue(':pass', $senha);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return $sql->fetch(PDO::FETCH_OBJ); //DEPOIS IMPLEMENTAR UMA CLASSE CLIENTE E SUBSTITUIR AQUI
        } else {
            return NULL;
        }
    }

    public function incluirCliente(Cliente $cliente)
    {
        $sql = ($this)->con->prepare("INSERT INTO lojaweb.clientes(cpf, nome, logradouro, cidade, estado, cep, telefone, data_nascimento, email, senha, rg) VALUES (:cpf, :nome, :logradouro, :cidade, :estado, :cep, :telefone, :data_nascimento, :email, :senha, :rg)");
        $sql->bindValue(":cpf", $cliente->get_cpf());
        $sql->bindValue(":nome", $cliente->get_nome());
        $sql->bindValue(":logradouro", $cliente->get_logradouro());
        $sql->bindValue(":cidade", $cliente->get_cidade());
        $sql->bindValue(":estado", $cliente->get_estado());
        $sql->bindValue(":cep", $cliente->get_cep());
        $sql->bindValue(":telefone", $cliente->get_telefone());
        $sql->bindValue(":data_nascimento", conversorData($cliente->get_data_nascimento()));
        $login = strtolower($cliente->get_email());
        $senha = strtolower($cliente->get_senha());
        $sql->bindValue(":email", $login);
        $sql->bindValue(":senha", $senha);
        $sql->bindValue(":rg", $cliente->get_rg());
        $sql->execute();
        $sql = ($this)->con->prepare("INSERT INTO lojaweb.usuarios(login, senha, tipo) VALUES (:login, :senha, :tipo);");
        $sql->bindValue(":login", $login);
        $sql->bindValue(":senha", $senha);
        $sql->bindValue(":tipo", $tipo);
        $sql->execute();
    }

    public function getClientes()
    {
        $sql = ($this)->con->query("SELECT * FROM lojaweb.clientes;");
        $clientes = array();
        while ($c = $sql->fetch(PDO::FETCH_OBJ)) {
            $cliente = new Cliente();
            $cliente->setAll($c->nome, $c->logradouro, $c->cidade, $c->estado, $c->cep, $c->telefone, $c->data_nascimento, $c->email, $c->senha, $c->rg);
            $cliente->set_cpf($c->cpf);
            $clientes[] = $cliente;
        }
        return $clientes;
    }

    public function excluirCliente($cpf)
    {
        $cliente = ($this)->getCliente($cpf);
        $sql = ($this)->con->prepare("UPDATE FROM lojaweb.clientes SET data_exclusao = :data_exclusao WHERE cpf = :cpf");
        $sql->bindValue(":cpf", $cpf);
        $sql->bindValue(":data_exclusao", conversorData(time()));
        $sql->execute();
        $sql = ($this)->con->prepare("DELETE FROM lojaweb.usuarios WHERE login = :login AND senha = :senha AND tipo = :tipo);");
        $sql->bindValue(":login", $cliente->get_email());
        $sql->bindValue(":senha", $cliente->get_senha());
        $sql->bindValue(":tipo", '2');
        $sql->execute();
    }

    public function getCliente($cpf)
    {
        $sql = ($this)->con->prepare("SELECT * FROM lojaweb.clientes WHERE cpf = :cpf");
        $sql->bindValue(":cpf", $cpf);
        $sql->execute();
        $c = $sql->fetch(PDO::FETCH_OBJ);
        $cliente = new Cliente();
        $cliente->setAll($c->nome, $c->logradouro, $c->cidade, $c->estado, $c->cep, $c->telefone, $c->data_nascimento, $c->email, $c->senha, $c->rg);
        $cliente->set_cpf($c->cpf);
        return $cliente;
    }

    public function atualizarCliente(Cliente $cliente)
    {
        session_start();
        $antigoCliente = $_SESSION['cliente'];
        $sql = ($this)->con->prepare(
            "UPDATE 
            lojaweb.clientes 
            SET 
            nome = :nome, 
            logradouro = :logradouro,
            cidade = :cidade, 
            estado = :estado, 
            cep = :cep, 
            telefone = :telefone, 
            data_nascimento = :data_nascimento,
            email = :email, 
            senha = :senha, 
            rg = :rg 
            WHERE 
            cpf = :cpf"
        );
        $sql->bindValue(":cpf", $cliente->get_cpf());
        $sql->bindValue(":nome", $cliente->get_nome());
        $sql->bindValue(":logradouro", $cliente->get_logradouro());
        $sql->bindValue(":cidade", $cliente->get_cidade());
        $sql->bindValue(":estado", $cliente->get_estado());
        $sql->bindValue(":cep", $cliente->get_cep());
        $sql->bindValue(":telefone", $cliente->get_telefone());
        $sql->bindValue(":data_nascimento", conversorData($cliente->get_data_nascimento()));
        $sql->bindValue(":email", $cliente->get_email());
        $sql->bindValue(":senha", $cliente->get_senha());
        $sql->bindValue(":rg", $cliente->get_rg());
        $sql->execute();
        $sql = ($this)->con->prepare("UPDATE lojaweb.usuarios SET login = :login, senha = :senha WHERE login = :oldlogin and senha = :oldsenha AND :tipo = tipo;");
        $sql->bindValue(":login", $cliente->get_email());
        $sql->bindValue(":senha", $cliente->get_senha());
        $sql->bindValue(":oldlogin", $antigoCliente->get_email());
        $sql->bindValue(":oldsenha", $antigoCliente->get_senha());
        $sql->bindValue(":tipo", '2');
        $sql->execute();
    }
}
