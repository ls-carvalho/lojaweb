<?php
require_once 'conexao.inc.php';
require_once '../classes/fabricante.inc.php';

class FabricanteDAO
{
    private $con;

    function __construct()
    {
        $conexao = new Conexao();
        ($this)->con = $conexao->getConexao();
    }

    public function getFabricantes()
    {
        $sql = ($this)->con->query("SELECT * FROM lojaweb.fabricantes;");
        $fabricantes = array();
        while ($f = $sql->fetch(PDO::FETCH_OBJ)) {
            $fabricantes[] = $f;
        }
        return $fabricantes;
    }

    public function getFabricante($id)
    {
        $sql = ($this)->con->prepare("SELECT nome FROM fabricantes WHERE codigo = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        $fab = $sql->fetch(PDO::FETCH_OBJ);
        return $fab->nome;
    }

    public function incluirFabricante(Fabricante $fabricante)
    {
        $sql = ($this)->con->prepare("INSERT INTO lojaweb.fabricantes(nome, logradouro, cidade, ramo, cep, email) VALUES (:nome, :logradouro, :cidade, :ramo, :cep, :email)");
        $sql->bindValue(":nome", $fabricante->get_nome());
        $sql->bindValue(":logradouro", $fabricante->get_logradouro());
        $sql->bindValue(":cidade", $fabricante->get_cidade());
        $sql->bindValue(":ramo", $fabricante->get_ramo());
        $sql->bindValue(":cep", $fabricante->get_cep());
        $sql->bindValue(":email", $fabricante->get_email());
        $sql->execute();
    }

    public function getFabricanteObj($codigo)
    {
        $sql = ($this)->con->prepare("SELECT * FROM lojaweb.fabricantes WHERE codigo = :codigo");
        $sql->bindValue(":codigo", $codigo);
        $sql->execute();
        $f = $sql->fetch(PDO::FETCH_OBJ);
        $fabricante = new Fabricante();
        $fabricante->setAll($f->nome, $f->logradouro, $f->cidade, $f->ramo, $f->cep, $f->email);
        $fabricante->set_codigo($f->codigo);
        return $fabricante;
    }

    public function getFabricantesObj()
    {
        $sql = ($this)->con->query("SELECT * FROM lojaweb.fabricantes;");
        $fabricantes = array();
        while ($f = $sql->fetch(PDO::FETCH_OBJ)) {
            $fabricante = new Fabricante();
            $fabricante->setAll($f->nome, $f->logradouro, $f->cidade, $f->ramo, $f->cep, $f->email);
            $fabricante->set_codigo($f->codigo);
            $fabricantes[] = $fabricante;
        }
        return $fabricantes;
    }

    public function atualizarFabricante(Fabricante $fabricante)
    {
        $sql = ($this)->con->prepare(
            "UPDATE 
            lojaweb.fabricantes 
            SET 
            nome = :nome, 
            logradouro = :logradouro,
            cidade = :cidade, 
            ramo = :ramo, 
            cep = :cep,
            email = :email
            WHERE 
            codigo = :codigo;"
        );
        $sql->bindValue(":codigo", $fabricante->get_codigo());
        $sql->bindValue(":nome", $fabricante->get_nome());
        $sql->bindValue(":logradouro", $fabricante->get_logradouro());
        $sql->bindValue(":cidade", $fabricante->get_cidade());
        $sql->bindValue(":ramo", $fabricante->get_ramo());
        $sql->bindValue(":cep", $fabricante->get_cep());
        $sql->bindValue(":email", $fabricante->get_email());
        $sql->execute();
    }

    public function excluirFabricante($codigo)
    {
        $sql = ($this)->con->prepare("DELETE FROM lojaweb.fabricantes WHERE codigo = :codigo);");
        $sql->bindValue(":codigo", $codigo);
        $sql->execute();
    }
}
