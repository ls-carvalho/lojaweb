<?php
require_once 'includes/cabecalho.inc.php';
?>
<div class="corpo" align="center" style="line-height: 3em;">
    <h1>Finalizar Compra</h1>
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