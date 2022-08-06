<?php
require_once '../dao/fabricanteDAO.inc.php';
require_once '../classes/fabricante.inc.php';

$opcao = (int)$_REQUEST['opcao'];
if ($opcao == 2 || $opcao == 3 || $opcao == 4 || $opcao == 5 || $opcao == 6) {
    $fabricanteDao = new FabricanteDAO();
    $fabricantes = $fabricanteDao->getFabricantes();
    session_start();
    $_SESSION['fabricantes'] = $fabricantes;
    if ($opcao == 2) {
        header('Location:../views/formProduto.php');
    } else if ($opcao == 3) {
        header('Location:../views/formProdutoAtualizar.php');
    } else if ($opcao == 4) {
        header('Location:controlerProduto.php?opcao=2');
    } else if ($opcao == 5) {
        header('Location:controlerProduto.php?opcao=6');
    } else if ($opcao == 6) {
        header('Location:controlerProduto.php?opcao=7&pagina=1');
    }
} else if ($opcao == 1) { //incluir
    $novo = new Fabricante();
    $novo->setAll($_REQUEST['pNome'], $_REQUEST['pLogradouro'], $_REQUEST['pCidade'], $_REQUEST['pRamo'], $_REQUEST['pCep'], $_REQUEST['pEmail']);
    $fabricanteDao = new FabricanteDAO();
    $fabricanteDao->incluirFabricante($novo);
    header('Location:controlerFabricante.php?opcao=9');
} else if ($opcao == 7) { //ir pra tela de atualizar
    $id = (int)$_REQUEST['id'];
    $fabricanteDao = new FabricanteDAO();
    $fabricante = $fabricanteDao->getFabricanteObj($id);
    session_start();
    $_SESSION['fabricante'] = $fabricante;
    header("Location:../views/formFabricanteAtualizar.php");
} else if ($opcao == 8) { //remover
    $id = (int)$_REQUEST['id'];
    $fabricanteDao = new FabricanteDAO();
    $fabricanteDao->excluirFabricante($id);
    header('Location:controlerFabricante.php?opcao=9');
} else if ($opcao == 9) { //visualizar
    $fabricanteDao = new FabricanteDAO();
    session_start();
    $_SESSION['fabricantesObj'] = $fabricanteDao->getFabricantesObj();
    header('Location:../views/exibirFabricantes.php');
} else if ($opcao == 10) { // atualizar de fato
    $fabricante = new Fabricante();
    $fabricante->setAll($_REQUEST['pNome'], $_REQUEST['pLogradouro'], $_REQUEST['pCidade'], $_REQUEST['pRamo'], $_REQUEST['pCep'], $_REQUEST['pEmail']);
    $fabricante->set_codigo($_REQUEST['pCodigo']);
    $fabricanteDao = new FabricanteDAO();
    $fabricanteDao->atualizarFabricante($fabricante);
    header('Location:controlerFabricante.php?opcao=9');
}
