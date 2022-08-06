<?php
require_once 'includes/autenticar.inc.php';
require_once 'includes/autenticarMenu.inc.php';
require_once '../classes/produto.inc.php';
require_once '../dao/fabricanteDAO.inc.php';
require_once '../classes/produtoCarrinho.inc.php';
$cliente = $_SESSION['cliente'];
$carrinho = $_SESSION['carrinho'];
$total = $_SESSION['total'];
$fabricanteDao = new FabricanteDAO();
?>
<div class="corpo" align="center" style="line-height: 3cm;">
    <h1>Finalizar Compra</h1>
    <p>
    <div style="line-height: 1cm;">
        <p>Nome: <?php echo $cliente->nome ?>
        <p>CPF: <?php echo $cliente->cpf ?>
        <p>Endereço: <?php echo $cliente->logradouro ?>
        <p>Telefone: <?php echo $cliente->telefone ?>
        <p>E-mail: <?php echo $cliente->email ?>
            <br>
    </div>
    <font face="Tahoma">
        <table border="1" cellspacing="2" cellpadding="1" width="50%">
            <tr>
                <th width="10%">Foto</th>
                <th>Referencia</th>
                <th>Nome</th>
                <th>Fabricante</th>
                <th>Valor</th>
                <th>Quantidade</th>
                <th>Valor Total</th>
            </tr>
            <?php
            foreach ($carrinho as $produto) {
                //MONTAGEM DA TABELA
                echo "<tr align='center'>";
                echo "<td><img src='imagens/produtos/" . $produto->get_referencia() . ".jpg' width='70%'></td>";
                echo "<td>" . $produto->get_produto_id() . "</td>";
                echo "<td>" . $produto->get_nome() . "</td>";
                echo "<td>" . $fabricanteDao->getFabricante($produto->get_cod_fabricante()) . "</td>";
                echo "<td> R$ " . $produto->get_preco() . "</td>";
                echo "<td>" . $produto->get_quantidade() . "</td>";
                echo "<td> R$ " . $produto->get_preco() * $produto->get_quantidade() . "</td>";
                echo "</tr>";
            }
            echo "<tr align='center'>";
            echo "<td><font color='black'><b>Total<b></font></td>";
            echo "<td colspan='6' align='right'><font color='red'><b> R$ " . $total . "</b></font></td>";
            echo "</tr>";
            ?>
        </table>
    </font>
    <form action="dadosPagamento.php">
        <input type="submit" value="Proximo>>>">
    </form>
</div>
<?php
require_once '../views/includes/rodape.inc.php';
?>