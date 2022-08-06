<?php
require_once '../classes/produto.inc.php';
require_once 'conexao.inc.php';
require_once '../utils/dataUtil.inc.php';

class ProdutoDAO
{
    private $con; //constrola a conexão do BD
    private $porPagina;

    function __construct()
    {
        $conexao = new Conexao();
        ($this)->con = $conexao->getConexao();
        ($this)->porPagina = 10; //valor de exibição padrão
    }

    public function incluirVariosProdutos()
    {
        for ($i = 1; $i <= 100; $i++) {
            $sql = ($this)->con->prepare("INSERT INTO produtos (nome, descricao, data_fabricacao, preco, estoque, referencia, cod_fabricante) VALUES (:n, :d, :da, :p, :e, :r, :f)");
            $sql->bindValue(':n', 'nome ' . $i);
            $sql->bindValue(':d', 'descricao do produto ' . $i);
            $sql->bindValue(':p', 10 + (2 * $i));
            $sql->bindValue(':e', $i * 10);
            $sql->bindValue(':da', '2100-12-31');
            $sql->bindValue(':r', 'ref ' . $i);
            $sql->bindValue(':f', 4002);
            $sql->execute();
        }
    }

    public function getPagina()
    {
        $resultTotal = $this->con->query("SELECT count(*) AS total FROM produtos")->fetch(PDO::FETCH_OBJ);
        $numPaginas = ceil($resultTotal->total / $this->porPagina);
        return $numPaginas;
    }

    public function getProdutosPaginacao($pagina)
    {
        $init = ($pagina - 1) * ($this)->porPagina;
        $result = ($this)->con->query("SELECT * FROM produtos LIMIT $init, $this->porPagina");
        $lista = array();
        while ($p = $result->fetch(PDO::FETCH_OBJ)) {
            $produto = new Produto();
            $produto->setAll($p->nome, $p->data_fabricacao, $p->preco, $p->estoque, $p->descricao, $p->referencia, $p->cod_fabricante);
            $produto->set_produto_id($p->produto_id);
            $lista[] = $produto;
        }
        return $lista;
    }

    public function getPorPagina()
    {
        return ($this)->porPagina;
    }

    public function setPorPagina($novoPorPagina)
    {
        ($this)->porPagina = $novoPorPagina;
    }

    public function incluirProduto(Produto $produto)
    {
        $sql = ($this)->con->prepare("INSERT INTO lojaweb.produtos(nome, data_fabricacao, preco, estoque, descricao, referencia, cod_fabricante) VALUES (:nome, :data_fabricacao, :preco, :estoque, :descricao, :referencia, :cod_fabricante)");
        $sql->bindValue(":nome", $produto->get_nome());
        $sql->bindValue(":data_fabricacao", conversorData($produto->get_data_fabricacao()));
        $sql->bindValue(":preco", $produto->get_preco());
        $sql->bindValue(":estoque", $produto->get_estoque());
        $sql->bindValue(":descricao", $produto->get_descricao());
        $sql->bindValue(":referencia", $produto->get_referencia());
        $sql->bindValue(":estoque", $produto->get_estoque());
        $sql->bindValue(":cod_fabricante", $produto->get_cod_fabricante());
        $sql->execute();
    }

    public function getProdutos()
    {
        $sql = ($this)->con->query("SELECT * FROM lojaweb.produtos;");
        $produtos = array();
        //$fabricanteDao = new FabricanteDAO();
        while ($p = $sql->fetch(PDO::FETCH_OBJ)) {
            $produto = new Produto();
            $produto->setAll($p->nome, $p->data_fabricacao, $p->preco, $p->estoque, $p->descricao, $p->referencia, $p->cod_fabricante);
            //$produto->setAll($p->nome, $p->data_fabricacao, $p->preco, $p->estoque, $p->descricao, $p->referencia, $fabricanteDao->getFabricante($p->cod_fabricante));
            $produto->set_produto_id($p->produto_id);
            $produtos[] = $produto;
        }
        return $produtos;
    }

    public function excluirProduto($produto_id)
    {
        $sql = ($this)->con->prepare("DELETE FROM produtos WHERE produto_id = :id");
        $sql->bindValue(":id", $produto_id);
        $sql->execute();
    }

    public function getProduto($id)
    { //parte do pressuposto que o produto existe no DB
        $sql = ($this)->con->prepare("SELECT * FROM produtos WHERE produto_id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        $p = $sql->fetch(PDO::FETCH_OBJ);
        $produto = new Produto();
        $produto->setAll($p->nome, $p->data_fabricacao, $p->preco, $p->estoque, $p->descricao, $p->referencia, $p->cod_fabricante);
        $produto->set_produto_id($p->produto_id);
        return $produto;
    }

    public function atualizarProduto(Produto $produto)
    {
        $sql = ($this)->con->prepare(
            "UPDATE 
            lojaweb.produtos 
            SET 
            nome = :nome, 
            data_fabricacao = :data_fabricacao, 
            preco = :preco, 
            estoque = :estoque, 
            descricao = :descricao, 
            cod_fabricante = :cod_fabricante 
            WHERE 
            produto_id = :produto_id"
        );
        $sql->bindValue(":nome", $produto->get_nome());
        $sql->bindValue(":data_fabricacao", conversorData($produto->get_data_fabricacao()));
        $sql->bindValue(":preco", $produto->get_preco());
        $sql->bindValue(":estoque", $produto->get_estoque());
        $sql->bindValue(":descricao", $produto->get_descricao());
        $sql->bindValue(":estoque", $produto->get_estoque());
        $sql->bindValue(":cod_fabricante", $produto->get_cod_fabricante());
        $sql->bindValue(":produto_id", $produto->get_produto_id());
        $sql->execute();
    }
}
