<?php
require_once 'includes/cabecalho.inc.php';
require_once '../classes/produto.inc.php';
require_once 'includes/autenticar.inc.php'; //já possui session_start();
require_once '../utils/dataUtil.inc.php';
//session_start();
$produto = $_SESSION['produto'];
$fabricantes = $_SESSION['fabricantes'];
?>
<div class="corpo" align="center" style="line-height: 3em;">
    <h2>Alteração de Produto</h2>
    <p>
    <form action="../controlers/controlerProduto.php" method="post">
        ID: <input type="text" size="3" name="pId" value="<?php echo $produto->get_produto_id() ?>" readonly>
        <p>Nome do Produto: <input type="text" size="20" name="pNome" value="<?php echo $produto->get_nome() ?>">
        <p>Data de Fabricação: <input type="date" name="pData" value="<?php echo formatarDataAmericano($produto->get_data_fabricacao()) ?>">
        <p>Preço: <input type="number" min="0" name="pPreco" value="<?php echo $produto->get_preco() ?>">
        <p>Quantidade em Estoque: <input type="number" min="0" name="pEstoque" value="<?php echo $produto->get_estoque() ?>">
        <p>Descrição: <input type="text" size="20" name="pDescricao" value="<?php echo $produto->get_descricao() ?>">
        <p>Referência: <input type="text" size="11" name="pReferencia" value="<?php echo $produto->get_referencia() ?>" readonly>
        <p>Fabricante:
            <select name="pCodFabricante">
                <!--<option value="()">-</option>>-->
                <?php
                foreach ($fabricantes as $fabricante) {
                    if ($fabricante->codigo != $produto->get_cod_fabricante()) {
                        echo "<option value='$fabricante->codigo'>" . $fabricante->codigo . " - " . $fabricante->nome . "</option>";
                    } else {
                        echo "<option value='$fabricante->codigo' selected>" . $fabricante->codigo . " - " . $fabricante->nome . "</option>";
                    }
                }
                ?>
            </select>
        <p><input type="submit" value="Atualizar"> <input type="reset" value="Cancelar">
            <input type="hidden" name="opcao" value="5">
    </form>
    <p>
</div>
<?php
require_once 'includes/rodape.inc.php';
?>