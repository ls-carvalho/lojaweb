<?php
require_once 'includes/cabecalho.inc.php';
?>
<div class="corpo" align="center" style="line-height: 3em;">
    <h1>Finalizar Compra</h1>
    <p>
        <?php
        if (isset($_REQUEST['erro'])) {
            $erro = (int)$_REQUEST['erro'];
            if ($erro == 1) {
                echo "<b><font face='Verdana' size='2' color='red'>Selecione um metodo!</font></b>";
            }
        }
        ?>
    <p>
    <form action="../controlers/controlerVenda.php">
        <p>Por favor, selecione o metodo de pagamento:</p>
        <input type="radio" name="pMetodo" value="boleto">
        <label>Boleto</label><br>
        <input type="radio" name="pMetodo" value="cartao">
        <label>Cartão</label><br>
        <input type="hidden" name="opcao" value="1">
        <input type="submit" value="Confirmar">
    </form>
</div>
<?php
require_once 'includes/rodape.inc.php';
?>