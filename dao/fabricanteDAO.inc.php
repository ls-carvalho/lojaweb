<?php
require_once 'conexao.inc.php';

class FabricanteDAO{
    private $con;

    function __construct()
    {
        $conexao = new Conexao();
        ($this)->con = $conexao->getConexao();
    }

    public function getFabricantes(){
        $sql = ($this)->con->query("SELECT * FROM lojaweb.fabricantes;");
        $fabricantes = array();
        while($f = $sql->fetch(PDO::FETCH_OBJ)){
            $fabricantes[] = $f;
        }
        return $fabricantes;
    }
}
?>