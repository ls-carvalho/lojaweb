<?php
require_once 'includes/autenticar.inc.php';
require_once 'includes/autenticarMenu.inc.php';
require_once '../classes/cliente.inc.php';
require_once '../utils/dataUtil.inc.php';
$cliente = $_SESSION['cliente'];
?>
<div class="corpo" align="center" style="line-height: 3em;">
    <h2>Dados Cadastrais</h2>
    <p>
    <p>CPF: <?php echo $cliente->get_cpf() ?>
    <p>Nome: <?php echo $cliente->get_nome() ?>
    <p>Logradouro: <?php echo $cliente->get_logradouro() ?>
    <p>Cidade: <?php echo $cliente->get_cidade() ?>
    <p>Estado: <?php echo $cliente->get_estado() ?>
    <p>CEP: <?php echo $cliente->get_cep() ?>
    <p>Telefone: <?php echo $cliente->get_telefone() ?>
    <p>Data de Nascimento: <?php echo conversorData($cliente->get_data_nascimento()) ?>
    <p>RG: <?php echo $cliente->get_rg() ?>
    <p>E-mail: <?php echo $cliente->get_email() ?>
    <p>
    <p>Deseja excluir sua conta? Clique <a href='../controlers/controlerCliente.php?opcao=4'>aqui</a>!
</div>
<?php
require_once 'includes/rodape.inc.php';
?>