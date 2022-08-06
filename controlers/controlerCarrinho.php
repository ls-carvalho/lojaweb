<?php
require_once '../classes/produto.inc.php';
require_once '../dao/produtoDAO.inc.php';
require_once '../classes/produtoCarrinho.inc.php';

$opcao = (int)$_REQUEST['opcao'];

if ($opcao == 1) { //incluir do carrinho
    $id = (int)$_REQUEST['id'];
    $produtoDao = new ProdutoDAO();
    $produto = new ProdutoCarrinho($produtoDao->getProduto($id));
    session_start();
    if (!isset($_SESSION['carrinho'])) {
        $carrinho = array();
    } else {
        $carrinho = $_SESSION['carrinho'];
    }
    //Melhoria nº2
    /*foreach ($carrinho as $itemCarrinho) {
        if ($produto->get_produto_id() == $itemCarrinho->get_produto_id()) {
            $erro = 1;
        }
    }
    if(isset($erro)){
        header('Location:../views/exibirCarrinho.php?erro=1');
    }else{*/
    foreach ($carrinho as $itemCarrinho) {
        if ($produto->get_produto_id() == $itemCarrinho->get_produto_id()) {
            $existe = 1;
            $itemCarrinho->adicionar_um();
        }
    }
    if (!isset($existe)) {
        $carrinho[] = $produto;
    }
    sort($carrinho);
    $_SESSION['carrinho'] = $carrinho;
    header('Location:../views/exibirCarrinho.php');
    //}
} else if ($opcao == 2) { //remover do carrinho
    $index = (int)$_REQUEST['id'];
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
        header('Location:../controlers/controlerClienteLogin.php?opcao=2');
    }
} else if ($opcao == 5) {
    $index = (int)$_REQUEST['id'];
    session_start();
    $carrinho = $_SESSION['carrinho'];
    if ($carrinho[$index]->get_quantidade() == 1) {
        header('Location:controlerCarrinho.php?opcao=2&id=' . $index);
    } else {
        $carrinho[$index]->remover_um();
        header("Location:../views/exibirCarrinho.php");
    }
} else if ($opcao == 6) { //esvaziar carrinho
    session_start();
    if (isset($_SESSION['carrinho'])) {
        unset($_SESSION['carrinho']);
    }
    header("Location:controlerCarrinho.php?opcao=3");
}
