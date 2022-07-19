<?php
require_once '../classes/venda.inc.php';
require_once '../dao/vendaDAO.inc.php';

$opcao = $_REQUEST['opcao'];

if ($opcao == 1) {
    session_start();
    $cliente = $_SESSION['cliente'];
    $carrinho = $_SESSION['carrinho'];
    $total = $_SESSION['total'];
    $venda = new Venda($cliente->cpf, $total);
    $vendaDao = new VendaDAO();
    $vendaDao->incluirVenda($venda, $carrinho);
    $tipo = $_REQUEST['pMetodo'];
    if ($tipo == 'boleto') {
        header('Location:../views/boleto/meuBoleto.php');
    } else if ($tipo == 'cartao') {
        //header('Location:../views/meuCartao.php');
    }
}
