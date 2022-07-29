<?php
require_once '../classes/produto.inc.php';
require_once '../dao/clienteDAO.inc.php';
require_once '../classes/cliente.inc.php';

$opcao = (int)$_REQUEST['opcao'];
$clienteDao = new ClienteDAO();

if ($opcao == 1) { //Login
    $email = $_REQUEST['pLogin'];
    $senha = $_REQUEST['pSenha'];
    $cliente = $clienteDao->autenticar($email, $senha);
    if ($cliente != NULL) {
        session_start();
        $_SESSION['cliente'] = $cliente;
        header('Location:../views/dadosCompra.php');
    } else {
        header('Location:../views/formClienteLogin.php?erro=1');
    }
}else if($opcao == 2){ //Cadastro
    $nome = $_REQUEST['pNome'];
    $cod_cliente = $_REQUEST['pCodCliente'];
    $endereco = $_REQUEST['pEndereco'];
    $telefone = $_REQUEST['pTelefone'];
    $cpf = $_REQUEST['pCpf'];
    $dt_nascimento = $_REQUEST['pDtNascimento'];
    $email = strtolower($_REQUEST['pLogin']);
    $senha = strtolower($_REQUEST['pSenha']);
    $cliente = new Cliente();
    $cliente->setAll($cod_cliente, $nome, $endereco, $telefone, $cpf, $dt_nascimento, $email, $senha);
    $clienteDao->incluirCliente($cliente);
    header('Location:../views/formLogin');
}
