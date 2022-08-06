<?php
require_once '../classes/cliente.inc.php';
require_once '../dao/clienteDAO.inc.php';

$opcao = (int)$_REQUEST['opcao'];

if ($opcao == 1) { //inclusão
    $novoCliente = new Cliente();
    $novoCliente->setAll($_REQUEST['pNome'], $_REQUEST['pLogradouro'], $_REQUEST['pCidade'], $_REQUEST['pEstado'], $_REQUEST['pCep'], $_REQUEST['pTelefone'], $_REQUEST['pData'], $_REQUEST['pEmail'], $_REQUEST['pSenha'], $_REQUEST['pRg']);
    $novoCliente->set_cpf($_REQUEST['pCpf']);
    $clienteDao = new ClienteDAO();
    $clienteDao->incluirCliente($novoCliente);
    session_start();
    $_SESSION['cliente'] = $novoCliente;
    header('Location:../views/formClienteLogin.php');
}
