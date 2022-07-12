<?php
require_once '../classes/produto.inc.php';
require_once '../views/includes/cabecalho.inc.php';
require_once '../dao/fabricanteDAO.inc.php';
?>
<div class="corpo" align="center" style="line-height: 3cm;">
    <h1>Finalizar Compra</h1>
    <p>
        <?php
        session_start();
        if (!isset($_SESSION['cliente'])) {
            echo "<h2><b>Carrinho vazio!</b></h2>";
        } else {
            $cliente = $_SESSION['cliente'];
            $carrinho = $_SESSION['carrinho'];
            $total = $_SESSION['total'];
            $fabricanteDao = new FabricanteDAO();
        ?>
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
                echo "</tr>";
            }
            echo "<tr align='center'>";
            echo "<td><font color='black'><b>Total<b></font></td>";
            echo "<td colspan='4' align='right'><font color='red'><b> R$ " . $total . "</b></font></td>";
            echo "</tr>";
            ?>
        </table>
    </font>
    <form action="dadosPagamento.php">
        <input type="submit" value="Proximo>>>">
    </form>
<?php
        }
?>
</div>
<?php
require_once '../views/includes/rodape.inc.php';
?>