<?php
require_once 'includes/autenticar.inc.php';
require_once 'includes/autenticarMenu.inc.php';
require_once '../classes/cliente.inc.php';
require_once '../utils/dataUtil.inc.php';
$cliente = $_SESSION['cliente'];
?>
<div class="corpo" align="center" style="line-height: 3em;">
    <h2>Alteração dos Dados Cadastrais</h2>
    <p>
    <form action="../controlers/controlerCliente.php" method="post">
        CPF: <input type=" text" size="12" name="pCpf" value="<?php echo $cliente->get_cpf() ?>">
        <p>Nome: <input type="text" size="50" name="pNome" value="<?php echo $cliente->get_nome() ?>">
        <p>Logradouro: <input type="text" size="100" name="pLogradouro" value="<?php echo $cliente->get_logradouro() ?>">
        <p>Cidade: <input type="text" size="30" name="pCidade" value="<?php echo $cliente->get_cidade() ?>">
        <p>Estado: <input type="text" size="2" name="pEstado" value="<?php echo $cliente->get_estado() ?>">
        <p>CEP: <input type="text" size="9" name="pCep" value="<?php echo $cliente->get_cep() ?>">
        <p>Telefone: <input type="text" size="12" name="pTelefone" value="<?php echo $cliente->get_telefone() ?>">
        <p>Data de Nascimento: <input type="date" name="pData" value="<?php echo conversorData($cliente->get_data_nascimento()) ?>">
        <p>RG: <input type="text" size="13" name="pRg" value="<?php echo $cliente->get_rg() ?>">
        <p>E-mail: <input type="text" size="20" name="pEmail" value="<?php echo $cliente->get_email() ?>">
        <p>Senha: <input type="text" size="12" name="pSenha" value="<?php echo $cliente->get_senha() ?>">
        <p><input type="submit" value="Atualizar"> <input type="reset" value="Cancelar">
            <input type="hidden" name="opcao" value="2">
    </form>
    <p>
</div>
<?php
require_once 'includes/rodape.inc.php';
?>