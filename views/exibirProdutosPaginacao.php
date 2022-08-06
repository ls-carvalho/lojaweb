<?php
require_once 'includes/autenticar.inc.php';
require_once 'includes/autenticarRestrito.inc.php';
require_once '../classes/produto.inc.php';
require_once '../utils/dataUtil.inc.php';
$produtos = $_SESSION['produtos'];
$fabricantes = $_SESSION['fabricantes'];
$numPaginas = $_REQUEST['paginas'];
?>
<div class="corpo" align="center" style="line-height: 3em;">
    <h1>Produtos cadastrados</h1>
    <p>
        <font face="Tahoma">
            <table border="1" cellspacing="2" cellpadding="1" width="50%">
                <tr>
                    <th witdh="10%">ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Data de Fabricação</th>
                    <th>Preço unitário</th>
                    <th>Em Estoque</th>
                    <th>Fabricante</th>
                    <th>Operação</th>
                </tr>
                <?php
                foreach ($produtos as $produto) {
                    //MONTAGEM DA TABELA
                    echo "<tr>";
                    echo "<td>" . $produto->get_produto_id() . "</td>";
                    echo "<td>" . $produto->get_nome() . "</td>";
                    echo "<td>" . $produto->get_descricao() . "</td>";
                    echo "<td>" . formatarData($produto->get_data_fabricacao()) . "</td>";
                    echo "<td> R$ " . $produto->get_preco() . "</td>";
                    echo "<td>" . $produto->get_estoque() . "</td>";
                    echo "<td>" . $produto->get_cod_fabricante() . "</td>";
                    // ultima célula da tabela
                    echo "<td><a href='../controlers/controlerProduto.php?opcao=3&id=" . $produto->get_produto_id() . "'>Alterar</a>&nbsp;";
                    echo "<a href='../controlers/controlerProduto.php?opcao=4&id=" . $produto->get_produto_id() . "'>Excluir</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </font>
    <div>
        <?php
        for ($i = 1; $i <= $numPaginas; $i++) {
            echo '<a href="../controlers/controlerProduto.php?opcao=7&pagina=' . $i . '">' . $i . '</a> ';
        }
        ?>
    </div>
</div>
<?php
require_once 'includes/rodape.inc.php';
?>