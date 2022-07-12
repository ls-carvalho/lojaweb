<?php
require_once '../classes/produto.inc.php';
require_once '../dao/clienteDAO.inc.php';

$opcao = (int)$_REQUEST['opcao'];

if ($opcao == 1) {
    $email = $_REQUEST['pLogin'];
    $senha = $_REQUEST['pSenha'];
    $clienteDao = new ClienteDAO();
    $cliente = $clienteDao->autenticar($email, $senha);
    if ($cliente != NULL) {
        session_start();
        $_SESSION['cliente'] = $cliente;
        header('Location:../views/dadosCompra.php');
    } else {
        header('Location:../views/formClienteLogin.php?erro=1');
    }
}
