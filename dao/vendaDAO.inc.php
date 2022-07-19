<?php
require_once 'conexao.inc.php';
require_once '../utils/dataUtil.inc.php';
require_once '../classes/venda.inc.php';
require_once '../classes/produto.inc.php';

class VendaDAO
{
    private $con;

    function __construct()
    {
        $conexao = new Conexao();
        ($this)->con = $conexao->getConexao();
    }

    public function incluirVenda($venda, $carrinho)
    {
        $sql = ($this)->con->prepare('INSERT INTO vendas (cpf_cliente, dataVenda, valorTotal) VALUES (:cpf, :dt, :vt)');
        $sql->bindValue(':cpf', $venda->get_cpf());
        $sql->bindValue(':dt', $venda->get_data());
        $sql->bindValue(':vt', $venda->get_valorTotal());
        $sql->execute();
        $id = ($this)->getIdVenda();
        ($this)->incluirItens($id, $carrinho);
    }

    function incluirItens($idVenda, $carrinho)
    {
        $cont = ($this)->getMax() + 1;
        foreach ($carrinho as $item) {
            $sql = ($this)->con->prepare('INSERT INTO itens (id_item, id_produto, quantidade, valorTotal, id_venda) VALUES (:idItem, :idProd, :quant, :vt, :idVenda)');
            $sql->bindValue(":idItem", $cont);
            $sql->bindValue(":idProd", $item->get_produto_id());
            $sql->bindValue(":quant", 1);
            $sql->bindValue(":vt", $item->get_preco());
            $sql->bindValue(":idVenda", $idVenda);
            $sql->execute();
            $cont++;
        }
    }

    function getIdVenda()
    { //retorna o ultimo idvenda na tabela
        $sql = ($this)->con->query('SELECT MAX(id_venda) AS maior FROM vendas');
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_OBJ);
        return $row->maior;
    }

    function getMax()
    { //retorna o ultimo idvenda na tabela
        $sql = ($this)->con->query('SELECT MAX(id_item) AS maior FROM itens');
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_OBJ);
        return $row->maior;
    }
}
