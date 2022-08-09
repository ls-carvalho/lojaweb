<?php
require_once '../classes/cliente.inc.php';
require_once '../dao/clienteDAO.inc.php';

$opcao = (int)$_REQUEST['opcao'];

if ($opcao == 1) { //inclusão
    $novoCliente = new Cliente();
    $email = strtolower($_REQUEST['pLogin']);
    $senha = strtolower($_REQUEST['pSenha']);
    $novoCliente->setAll(
        $_REQUEST['pNome'], 
        $_REQUEST['pLogradouro'], 
        $_REQUEST['pCidade'], 
        $_REQUEST['pEstado'], 
        $_REQUEST['pCep'], 
        $_REQUEST['pTelefone'], 
        $_REQUEST['pData'], 
        $email, 
        $senha, 
        $_REQUEST['pRg']
    );
    $novoCliente->set_cpf($_REQUEST['pCpf']);
    $clienteDao = new ClienteDAO();
    $clienteDao->incluirCliente($novoCliente);
    session_start();
    $_SESSION['cliente'] = $novoCliente;
    header('Location:../views/formClienteLogin.php');
} else if ($opcao == 2) { //atualizar
    $cliente = new Cliente();
    $email = strtolower($_REQUEST['pLogin']);
    $senha = strtolower($_REQUEST['pSenha']);
    $cliente->setAll(
        $_REQUEST['pNome'], 
        $_REQUEST['pLogradouro'], 
        $_REQUEST['pCidade'], 
        $_REQUEST['pEstado'], 
        $_REQUEST['pCep'], 
        $_REQUEST['pTelefone'], 
        $_REQUEST['pData'], 
        $email, 
        $senha,
        $_REQUEST['pRg']
    );
    $cliente->set_cpf($_REQUEST['pCpf']);
    $clienteDao = new ClienteDAO();
    $clienteDao->atualizarCliente($cliente);
    session_start();
    $_SESSION['cliente'] = $cliente;
    header('Location:controlerCliente.php?opcao=3');
} else if ($opcao == 3) { // exibir dados cadastrais
    session_start();
    if (isset($_SESSION['cliente'])) {
        header('Location:../views/exibirClienteDadosCadastral.php');
    } else {
        header('Location:../views/formClienteLogin.php');
    }
} else if ($opcao == 4) { //excluir
    session_start();
    if (isset($_SESSION['cliente'])) {
        $clienteDao->excluirCliente($_SESSION['cliente']);
        header('Location:controlerCliente.php?opcao=5');
    } else {
        header('Location:../views/formClienteLogin.php');
    }
} else if ($opcao == 5) { //deslogar
    session_start();
    if (isset($_SESSION['cliente'])) {
        unset($_SESSION['logado']);
        unset($_SESSION['tipousuario']);
        unset($_SESSION['cliente']);
    }
    header('Location:../views/formClienteLogin.php');
}
