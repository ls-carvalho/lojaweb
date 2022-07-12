<?php
require_once '../classes/produto.inc.php';
require_once '../dao/produtoDAO.inc.php';

$opcao = (int)$_REQUEST['opcao'];

if ($opcao == 1) { //incluir do carrinho
    $id = (int)$_REQUEST['id'];
    $produtoDao = new ProdutoDAO();
    $produto = $produtoDao->getProduto($id);
    session_start();
    if (!isset($_SESSION['carrinho'])) {
        $carrinho = array();
    } else {
        $carrinho = $_SESSION['carrinho'];
    }
    $carrinho[] = $produto;
    sort($carrinho);
    $_SESSION['carrinho'] = $carrinho;
    header('Location:../views/exibirCarrinho.php');
} else if ($opcao == 2) { //remover do carrinho
    $index = (int)$_REQUEST['index'];
    session_start();
    $carrinho = $_SESSION['carrinho'];
    unset($carrinho[$index]);
    sort($carrinho);
    $_SESSION['carrinho'] = $carrinho;
    header("Location:controlerCarrinho.php?opcao=3");
} else if ($opcao == 3) { //verifica se o carrinho existe
    session_start();
    if (!isset($_SESSION['carrinho']) || sizeof($_SESSION['carrinho']) == 0) {
        header("Location:../views/exibirCarrinho.php?status=1");
    } else {
        header("Location:../views/exibirCarrinho.php");
    }
} else if ($opcao == 4) {
    echo $_REQUEST['total'];
    session_start();
    if (!isset($_SESSION['carrinho'])) {
        //erro de carrinho vazio
    } else {
        $total = $_REQUEST['total'];
        $_SESSION['total'] = $total;
        //header('Location:../controlers/controlerClienteLogin.php');
        header('Location:../views/formClienteLogin.php?erro=2');
    }
}
