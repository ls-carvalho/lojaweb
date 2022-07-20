<?php
require_once 'conexao.inc.php';

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

        //var_dump($fab);
        return $fab->nome;
    }
}
