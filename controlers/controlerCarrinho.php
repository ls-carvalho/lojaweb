<?php
    require_once '../classes/produto.inc.php';
    require_once '../dao/produtoDAO.inc.php';

    $opcao = (int)$_REQUEST['opcao'];

    if($opcao==1){ //incluir do carrinho
        $id = (int)$_REQUEST['id'];
        $produtoDao = new ProdutoDAO();
        $produto = $produtoDao->getProduto($id);
        session_start();
        if(!isset($_SESSION['carrinho'])){
            $carrinho = array();
        }else{
            $carrinho = $_SESSION['carrinho'];
        }
        $carrinho[] = $produto;
        $_SESSION['carrinho'] = $carrinho;
        header('Location:../views/exibirCarrinho.php');
    }
?>