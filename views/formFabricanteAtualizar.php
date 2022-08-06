<?php
require_once 'includes/autenticar.inc.php';
require_once 'includes/autenticarRestrito.inc.php';
require_once '../classes/fabricante.inc.php';
require_once '../utils/dataUtil.inc.php';
$fabricante = $_SESSION['fabricante'];
?>
<div class="corpo" align="center" style="line-height: 3em;">
    <h2>Alteração de Fabricante</h2>
    <p>
    <form action="../controlers/controlerFabricante.php" method="post">
        Código: <input type="text" size="20" name="pCodigo" value="<?php echo $fabricante->get_codigo() ?>" readonly>
        <p>Nome: <input type="text" size="120" name="pNome" value="<?php echo $fabricante->get_nome() ?>">
        <p>Logradouro: <input type="text" size="200" name="pLogradouro" value="<?php echo $fabricante->get_logradouro() ?>">
        <p>CEP: <input type="text" size="10" name="pCep" value="<?php echo $fabricante->get_cep() ?>">
        <p>Cidade: <input type="text" size="30" name="pCidade" value="<?php echo $fabricante->get_cidade() ?>">
        <p>E-mail: <input type="text" size="30" name="pEmail" value="<?php echo $fabricante->get_email() ?>">
        <p>Ramo: <input type="text" size="30" name="pRamo" value="<?php echo $fabricante->get_ramo() ?>">
        <p><input type="submit" value="Atualizar"> <input type="reset" value="Cancelar">
            <input type="hidden" name="opcao" value="10">
    </form>
    <p>
</div>
<?php
require_once 'includes/rodape.inc.php';
?>