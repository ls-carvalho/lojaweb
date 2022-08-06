<?php
require_once 'includes/autenticar.inc.php';
require_once 'includes/autenticarRestrito.inc.php';
?>
<div class="corpo" align="center" style="line-height: 3em;">
    <h2>Cadastro de Fabricante</h2>
    <p>
    <form action="../controlers/controlerFabricante.php" method="post">
        Nome: <input type="text" size="120" name="pNome">
        <p>Logradouro: <input type="text" size="200" name="pLogradouro">
        <p>CEP: <input type="text" size="10" name="pCep">
        <p>Cidade: <input type="text" size="30" name="pCidade">
        <p>E-mail: <input type="text" size="30" name="pEmail">
        <p>Ramo: <input type="text" size="30" name="pRamo">
        <p><input type="submit" value="Cadastrar"> <input type="reset" value="Cancelar">
            <input type="hidden" name="opcao" value="1">
    </form>
    <p>
</div>
<?php
require_once 'includes/rodape.inc.php';
?>