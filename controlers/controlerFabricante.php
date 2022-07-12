<?php
require_once '../dao/fabricanteDAO.inc.php';

$opcao = (int)$_REQUEST['opcao'];
if ($opcao == 1) {
} else if ($opcao == 2 || $opcao == 3 || $opcao == 4 || $opcao == 5) {
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
    }
}
