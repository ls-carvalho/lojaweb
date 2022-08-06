<?php
require_once 'includes/autenticar.inc.php';
require_once 'includes/autenticarRestrito.inc.php';
$fabricantes = $_SESSION['fabricantes'];
?>
<div class="corpo" align="center" style="line-height: 3em;">
    <h2>Cadastro de Produto</h2>
    <p>
    <form action="../controlers/controlerProduto.php" method="post" enctype="multipart/form-data">
        Nome: <input type="text" size="20" name="pNome">
        <p>Data de Fabricação: <input type="date" name="pData">
        <p>Preço: <input type="number" min="0" name="pPreco">
        <p>Quantidade em Estoque: <input type="number" min="0" name="pEstoque">
        <p>Descrição: <input type="text" size="20" name="pDescricao">
        <p>Referência: <input type="text" size="11" name="pReferencia">
        <p>Fabricante:
            <select name="pCodFabricante">
                <option value="()">-</option>>
                <?php
                foreach ($fabricantes as $fabricante) {
                    echo "<option value='$fabricante->codigo'>" . $fabricante->codigo . " - " . $fabricante->nome . "</option>";
                }
                ?>
            </select>
        <p>Foto: <input type="file" name="imagem" />
        <p><input type="submit" value="Cadastrar"> <input type="reset" value="Cancelar">
            <input type="hidden" name="opcao" value="1">
    </form>
    <p>
</div>
<?php
require_once 'includes/rodape.inc.php';
?>