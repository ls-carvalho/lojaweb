<?php
require_once '../classes/venda.inc.php';
require_once '../dao/vendaDAO.inc.php';
require_once '../dao/produtoDAO.inc.php';
require_once '../classes/produtoCarrinho.inc.php';

$opcao = $_REQUEST['opcao'];

if ($opcao == 1) {
    session_start();
    $cliente = $_SESSION['cliente'];
    $carrinho = $_SESSION['carrinho'];
    $total = $_SESSION['total'];
    $venda = new Venda($cliente->cpf, $total);
    $vendaDao = new VendaDAO();
    $vendaDao->incluirVenda($venda, $carrinho);
    if (!isset($_REQUEST['pMetodo'])) {
        header('Location:../views/dadosPagamento.php?erro=1');
    } else {
        $tipo = $_REQUEST['pMetodo'];
        //Melhoria 4
        $produtoDao = new ProdutoDAO();
        foreach ($carrinho as $item) {
            $id = $item->get_produto_id();
            $produto = $produtoDao->getProduto($id);
            $estoque = $produto->get_estoque();
            //Não realizei validação
            $estoque -= $item->get_quantidade();
            $produto->set_estoque($estoque);
            $produtoDao->atualizarProduto($produto);
        }
        //falta esvaziar o carrinho
        if ($tipo == 'boleto') {
            header('Location:../views/boleto/meuBoleto.php');
        } else if ($tipo == 'cartao') {
            //header('Location:../views/meuCartao.php');
        }
    }
}
