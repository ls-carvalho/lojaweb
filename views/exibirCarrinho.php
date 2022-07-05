<?php
    require_once '../classes/produto.inc.php';
    require_once '../views/includes/cabecalho.inc.php';
    session_start();
    $carrinho = $_SESSION['carrinho'];
?>
    <div class="corpo" align="center" style="line-height: 3cm;">
        <h1>Carrinho de Compras</h1>
        <p>
        <font face="Tahoma">
            <table border="1" cellspacing="2" cellpadding="1" width="50%">
                <tr>
                    <th witdh="10%">Nro</th>
                    <th>Referencia</th>
                    <th>Nome</th>
                    <th>Fabricante</th>
                    <th>Valor</th>
                    <th width="10%">Remover?</th>
                </tr>
<?php
                $contador = 0;
                $total = 0;
                foreach($carrinho as $produto){
                    //MONTAGEM DA TABELA
                    $contador++;
                    $total += $produto->get_preco();
                    echo "<tr align='center'>";
                        echo "<td>". $contador ."</td>";
                        echo "<td>". $produto->get_produto_id() ."</td>";
                        echo "<td>". $produto->get_nome() ."</td>";
                        echo "<td>". $produto->get_cod_fabricante() ."</td>";
                        echo "<td> R$ ". $produto->get_preco() ."</td>";
                        echo "<td><a href='"."'><img src='imagens/rem3.jpg'></a></td>";
                    echo "</tr>";
                }
                echo "<tr align='center'>";
                echo "<td><font color='black'><b>Total<b></font></td>";
                echo "<td colspan='4' align='right'><font color='red'><b> R$ ".$total."</b></font></td>";
                echo "</tr>";
?>
            </table>
        </font>
<?php
    echo "<a href='produtosVenda.php'><img src='imagens/botao_continuar_comprando.png'></a>";
    echo "<a href='"."'><img src='imagens/finalizarCompra.png'></a>";
?>
    </div>
<?php
    require_once '../views/includes/rodape.inc.php';
?>