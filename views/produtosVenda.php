<?php
    require_once 'includes/cabecalho.inc.php';
    require_once '../classes/produto.inc.php';
    session_start();
    $produtos = $_SESSION['produtos'];
    $fabricantes = $_SESSION['fabricantes'];
?>
    <div class="corpo" align="center" style="line-height: 3em;">
        <h1>Produtos cadastrados</h1>
        <p>
<?php
    foreach($produtos as $produto){
?>
        <table border="0" width="30%" cellspacing="10">
            <tr>
                <td rowspan="5" align="center">
                    <img src="imagens/produtos/<?php echo $produto->get_referencia();?>.jpg" width="200" height="200" border="0">
                </td>
            </tr>
            <tr align="left">
                <font face="Verdana" size="3"><td colspan="2"><b><?php echo $produto->get_nome();?></b></td></font>
            </tr>
            <tr>
                <td style="text-align:justify" colspan="2"><font face="Verdana" size="2"><?php echo $produto->get_descricao();?></font></td>
            </tr>
            <tr>
                <td colspan="2"><font face="Verdana" size="2">
                    <?php
                        foreach($fabricantes as $fabricante){
                            if($produto->get_cod_fabricante() == $fabricante->codigo){
                                echo $fabricante->nome;
                            }
                        }
                    ?>
                </font></td>
            </tr>
            <tr>
                <td><font face="Verdana" size="3" color="red"><b><font color="black">Valor: </font><?php echo $produto->get_preco();?></b></font></td>
                <td colspan="2"><?php echo '<a href="../controlers/controlerCarrinho.php?opcao=1&id='.$produto->get_produto_id().'"><img src="imagens/botao_comprar2.png" border="0"></a>'?></td>
            </tr>
        </table>
        <p>
        <hr width="30%">
        <p>
<?php
    }
?>
    </div>
<?php
    require_once 'includes/rodape.inc.php';
?>