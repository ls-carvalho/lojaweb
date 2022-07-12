<?php
require_once '../classes/produto.inc.php';
require_once '../dao/produtoDAO.inc.php';

function uploadFotos($ref)
{
    $imagem = $_FILES["imagem"];
    $nome = $ref; // será colocado a Referência do produto como nome do arquivo
    if ($imagem != NULL) {
        $nome_temporario = $_FILES["imagem"]["tmp_name"];
        copy($nome_temporario, "../views/imagens/produtos/$nome.jpg");
    } else {
        echo "Você não realizou o upload de forma satisfatória.";
    }
}

function deletarFoto($ref)
{
    $arquivo = "../views/imagens/produtos/$ref.jpg";
    if (file_exists($arquivo)) { // verifica se o arquivo existe
        if (!unlink($arquivo)) { //aqui que se remove o arquivo retornando true, senão mostra mensagem
            echo "Não foi possível deletar o arquivo!";
        }
    }
}

$opcao = (int)$_REQUEST['opcao'];

if ($opcao == 1) { //inclusão
    $novoProduto = new Produto();
    $novoProduto->setAll($_REQUEST['pNome'], $_REQUEST['pData'], $_REQUEST['pPreco'], $_REQUEST['pEstoque'], $_REQUEST['pDescricao'], $_REQUEST['pReferencia'], $_REQUEST['pCodFabricante']);
    $produtoDao = new ProdutoDAO();
    $produtoDao->incluirProduto($novoProduto);
    uploadFotos($_REQUEST['pReferencia']);
    header('Location:controlerProduto.php?opcao=2');
} else if ($opcao == 2 || $opcao == 6) {
    $produtoDao = new ProdutoDAO();
    session_start();
    $_SESSION['produtos'] = $produtoDao->getProdutos();
    if ($opcao == 2) {
        header('Location:../views/exibirProdutos.php');
    } else { //opcao == 6
        header('Location:../views/produtosVenda.php');
    }
} else if ($opcao == 3) {
    $id = (int)$_REQUEST['id'];
    $produtoDao = new ProdutoDAO();
    $produto = $produtoDao->getProduto($id);
    session_start();
    $_SESSION['produto'] = $produto;
    header("Location:controlerFabricante.php?opcao=3");
} else if ($opcao == 4) {
    $id = (int)$_REQUEST['id'];
    $produtoDao = new ProdutoDAO();
    deletarFoto($produtoDao->getProduto($id)->get_referencia());
    $produtoDao->excluirProduto($id);
    header('Location:controlerProduto.php?opcao=2');
} else if ($opcao == 5) {
    $produto = new Produto();
    $produto->setAll($_REQUEST['pNome'], $_REQUEST['pData'], $_REQUEST['pPreco'], $_REQUEST['pEstoque'], $_REQUEST['pDescricao'], $_REQUEST['pReferencia'], $_REQUEST['pCodFabricante']);
    $produto->set_produto_id($_REQUEST['pId']);
    $produtoDao = new ProdutoDAO();
    $produtoDao->atualizarProduto($produto);
    header('Location:controlerProduto.php?opcao=2');
}
