<?php
require_once 'produto.inc.php';
class ProdutoCarrinho extends Produto
{
    protected $quantidade;

    function __construct(Produto $produto)
    {
        ($this)->produto_id = $produto->get_produto_id();
        ($this)->nome = $produto->get_nome();
        ($this)->data_fabricacao = $produto->get_data_fabricacao();
        ($this)->preco = $produto->get_preco();
        ($this)->estoque = $produto->get_estoque();
        ($this)->descricao = $produto->get_descricao();
        ($this)->referencia = $produto->get_referencia();
        ($this)->cod_fabricante = $produto->get_cod_fabricante();
        ($this)->quantidade = 1;
    }

    //getters and setters
    function get_quantidade()
    {
        return ($this)->quantidade;
    }

    function set_quantidade($nova_quantidade)
    {
        ($this)->quantidade = $nova_quantidade;
    }

    function adicionar_um(){
        ($this)->quantidade += 1;
    }

    function remover_um(){
        ($this)->quantidade -= 1;
    }
}
