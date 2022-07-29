<?php
require_once 'conexao.inc.php';

class TipoDAO
{
    private $con;

    function __construct()
    {
        $conexao = new Conexao();
        ($this)->con = $conexao->getConexao();
    }

    public function getAllTipo()
    {
        $sql = ($this)->con->query("SELECT * FROM lojaweb.fabricantes;");
        $tipos = array();
        while ($t = $sql->fetch(PDO::FETCH_OBJ)) {
            $tipos[] = $t;
        }
        return $tipos;
    }

    public function getTipo($id)
    {
        $sql = ($this)->con->prepare("SELECT nome FROM tipo WHERE id_tipo = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        $tipo = $sql->fetch(PDO::FETCH_OBJ);

        //var_dump($fab);
        return $tipo->nome;
    }

    public function getMaxTipo()
    {
        $sql = ($this)->con->query("SELECT nome, MAX(tipo) FROM tipo GROUP BY nome");

        $tipo = $sql->fetch(PDO::FETCH_OBJ);

        //var_dump($fab);
        return $tipo->nome;
    }
}
